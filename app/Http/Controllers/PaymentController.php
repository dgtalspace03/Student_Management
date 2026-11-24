<?php

namespace App\Http\Controllers;

use App\Services\StripeService;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    protected StripeService $stripe;
    function __construct(StripeService $stripe)
    {
        $this->stripe = $stripe;
    }
    public function checkout()
    {
        $session = $this->stripe->client()->checkout->sessions->create([
            'line_items' => [
                [
                    'price_data'=>[
                    'currency'=>'usd',
                    'product_data'=>[
                        'name'=>'laravel sripe'
                    ],
                    'unit_amount'=>5000
                    ],
                    'quantity'=>1
                ]
            ],
            'mode' => 'payment',
            'success_url' => route('payment.success') . '?session_id={CHECKOUT_SESSION_ID}',
            'cancel_url' => route('payment.cancel'),
        ]);

        return redirect($session->url);
    }
    public function success()
    {
        return 'payment success';
    }
    public function cancel()
    {
        return 'payment cancel';
    }
}
