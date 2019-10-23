<?php

namespace Tjventurini\VoyagerShop\Events;

use Illuminate\Support\Collection;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Tjventurini\VoyagerShop\Models\Order;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class OrderCart
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $Order;
    public $OrderItems;
    public $price;
    public $description;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Order &$Order, Collection &$OrderItems, int &$price, string &$description)
    {
        $this->Order = &$Order;
        $this->OrderItems = &$OrderItems;
        $this->price = &$price;
        $this->description = &$description;
    }
}
