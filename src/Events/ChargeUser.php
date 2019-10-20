<?php

namespace Tjventurini\VoyagerShop\Events;

use App\User;
use Laravel\Cashier\Payment;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class ChargeUser
{
    public $user;
    public $description;
    public $payment;

    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(User &$user, string &$description, Payment &$payment)
    {
        $this->user = $user;
        $this->description = $description;
        $this->payment = $payment;
    }
}
