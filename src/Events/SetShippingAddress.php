<?php

namespace Tjventurini\VoyagerShop\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Tjventurini\VoyagerShop\Models\Project;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class SetShippingAddress
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $shipping_address;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(array &$shipping_address)
    {
        $this->shipping_address = &$shipping_address;
    }
}
