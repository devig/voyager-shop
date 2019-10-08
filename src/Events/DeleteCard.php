<?php

namespace Tjventurini\VoyagerShop\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Tjventurini\VoyagerShop\Models\Card;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class DeleteCard
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $Card;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Card &$Card)
    {
        $this->Card = &$Card;
    }
}
