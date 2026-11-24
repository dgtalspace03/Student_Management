<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\Webhook;
use Stripe\Exception\SignatureVerificationException;

class StripeWebhookController extends Controller
{
    public function handle(Request $request)
    {
        $payload = $request->getContent();

        $signature = $request->header('Stripe-Signature');

        try {
            $event = Webhook::constructEvent(
                $payload,
                $signature,
                config('services.stripe.webhook_secret')
            );
        } catch (\UnexpectedValueException $e) {
            return response('Invalid payload', 400);
        } catch (SignatureVerificationException $e) {
            return response('Invalid signature', 400);
        }

        switch ($event->type) {

            case 'checkout.session.completed':

                $session = $event->data->object;

                if ($session->payment_status === 'paid') {
                    // Find your order using session metadata.
                    // Update order status to paid.
                }

                break;

            case 'checkout.session.async_payment_succeeded':

                // Handle delayed payment success.

                break;

            case 'checkout.session.async_payment_failed':

                // Handle delayed payment failure.

                break;
        }

        return response('Webhook handled', 200);
    }
}