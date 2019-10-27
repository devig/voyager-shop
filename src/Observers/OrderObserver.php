<?php

namespace Tjventurini\VoyagerShop\Observers;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Tjventurini\VoyagerShop\Models\Order;
use Tjventurini\VoyagerShop\Models\Project;

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
        $order->token = Str::random(config('voyager-shop.tokens_length'));

        // connect with user
        $User = Auth::user();
        if ($User) {
            $order->user()->associate($User);
        }

        // connect with project
        $project_token = request()->headers->get('project_token', false);
        if ($project_token) {
            $Project = Project::where('token', $project_token)->first();
            $order->project()->associate($Project);
        }
    }
}
