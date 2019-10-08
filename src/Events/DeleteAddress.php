<?php

namespace Tjventurini\VoyagerShop\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Tjventurini\VoyagerShop\Models\Address;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class UpdateOrCreateAddress
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $Address;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Address &$Address)
    {
        $this->Address = &$Address;
    }
}
