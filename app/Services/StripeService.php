<?php

namespace App\Services;

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
}
