<?php

namespace Tjventurini\VoyagerShop\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Tjventurini\VoyagerShop\Models\Order;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Tjventurini\VoyagerShop\Models\OrderItem;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class UpdateCart
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $Order;
    public $OrderItem;
    public $data;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Order &$Order, OrderItem &$OrderItem, array &$data)
    {
        $this->Order = &$Order;
        $this->OrderItem = &$OrderItem;
        $this->data = &$data;
    }
}
