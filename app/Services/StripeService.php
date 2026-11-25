<?php

namespace App\Services;

use App\Models\Order;
use Stripe\StripeClient;

class StripeService
{
   protected StripeClient $stripe;
    public function __construct()
    {
        $this->stripe= new StripeClient(config('services.stripe.secret'));
    }
    public function client():StripeClient{
        return $this->stripe;
    }
    public function checkout(Order $order){
           $session = $this->client()->checkout->sessions->create([
            'line_items' => [
                [
                    'price_data' => [
                        'currency' => 'usd',
                        'product_data' => [
                            'name' => $order->course->title,

                        ],
                        'unit_amount' => $order->course->price * 100
                    ],
                    'quantity' => 1
                ],

            ],
            'mode' => 'payment',
            'customer_email'      => $order->user->email, 
            'client_reference_id' => (string) $order->id,
            'metadata' => [
                'order_id' => $order->id,
                'course_id' => $order->course_id
            ],
            'expires_at'=> time() + 1800, 
            'success_url' => route('payment.success') . '?session_id={CHECKOUT_SESSION_ID}',
            'cancel_url' => route('payment.cancel', ['order' => $order->id]),
        ]);
        $order->stripe_session_id = $session->id;
        $order->save();
        
        return $session;
    }
}
