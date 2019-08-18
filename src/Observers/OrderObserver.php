<?php

namespace Tjventurini\VoyagerShop\Observers;

use Tjventurini\VoyagerShop\Models\Order;
use Illuminate\Support\Str;

class OrderObserver
{
    /**
     * Handle creating event of order model.
     * @param  Order $order The order model.
     * @return void
     */
    public function creating(Order $order): void
    {
        // create token
        $order->token = Str::random(60);
    }
}
