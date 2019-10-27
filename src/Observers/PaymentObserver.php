<?php

namespace Tjventurini\VoyagerShop\Observers;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Tjventurini\VoyagerShop\Models\Payment;
use Tjventurini\VoyagerShop\Models\Project;

class PaymentObserver
{
    /**
     * Handle creating event of payment model.
     * @param  Payment $payment The payment model.
     * @return void
     */
    public function creating(Payment $payment): void
    {
        // create token
        $payment->token = Str::random(config('voyager-shop.tokens_length'));
    }
}
