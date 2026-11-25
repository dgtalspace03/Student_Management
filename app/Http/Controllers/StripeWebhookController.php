<?php

namespace App\Http\Controllers;

use App\Enum\OrderStatus;
use App\Models\Enrollment;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Stripe\Checkout\Session;
use Stripe\Exception\SignatureVerificationException;
use Stripe\Webhook;

class StripeWebhookController extends Controller
{
    public function handle(Request $request)
    {
        try {
            $event = Webhook::constructEvent(
                $request->getContent(),
                $request->header('Stripe-Signature'),
                config('services.stripe.webhook_secret')
            );
        } catch (\UnexpectedValueException | SignatureVerificationException $e) {
            Log::warning('Stripe webhook rejected: ' . $e->getMessage());
            return response('Invalid webhook', 400);
        }

        Log::info('Stripe webhook received', ['type' => $event->type]);

        match ($event->type) {
            'checkout.session.completed',
            'checkout.session.async_payment_succeeded' => $this->handlePaid($event->data->object),
            'checkout.session.expired'                 => $this->handleExpired($event->data->object),
            default => null,
        };

        return response()->json(['received' => true]);
    }

    private function handlePaid(Session $session): void
    {
        
        Log::info('handlePaid called', [
            'payment_status' => $session->payment_status,
            'order_id'       => $session->metadata->order_id ?? null,
        ]);

        if ($session->payment_status !== 'paid') {
            return;
        }

        DB::transaction(function () use ($session) {
            $order = Order::where('id', $session->metadata->order_id ?? null)
                ->lockForUpdate()
                ->first();

            if (! $order) {
                Log::error('Stripe webhook: order not found', ['session' => $session->id]);
                return;
            }

            Log::info('Order found', ['id' => $order->id, 'status' => $order->status]);

            if ($order->status === OrderStatus::Paid) {
                return;
            }

            $order->update([
                'status'                   => OrderStatus::Paid,
                'stripe_payment_intent_id' => $session->payment_intent,
            ]);

            Log::info('Order updated to paid', ['id' => $order->id]);

            Enrollment::firstOrCreate(
                [
                    'user_id'   => $order->user_id,
                    'course_id' => $order->course_id,
                    'order_id' => $order->id,
                ],
            );
        });
    }
    private function handleExpired($session): void
{
    Order::where('stripe_session_id', $session->id)
        ->where('status', OrderStatus::Pending)
        ->update(['status' => OrderStatus::Expired]);
}
}
