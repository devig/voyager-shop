<?php

namespace Tjventurini\VoyagerShop\Models;

use Tjventurini\VoyagerShop\Models\BaseModel;
use Tjventurini\VoyagerShop\Traits\Relationships\BelongsToUser;
use Tjventurini\VoyagerShop\Traits\Relationships\BelongsToProject;
use Tjventurini\VoyagerShop\Traits\Relationships\HasManyOrderItems;
use Tjventurini\VoyagerShop\Traits\Relationships\BelongsToBillingAddress;
use Tjventurini\VoyagerShop\Traits\Relationships\BelongsToShippingAddress;

class Order extends BaseModel
{
    use BelongsToProject,
        BelongsToUser,
        BelongsToBillingAddress,
        BelongsToShippingAddress,
        HasManyOrderItems;

    protected $guarded = ['id'];

    protected $attributes = [
        'state' => 'cart',
    ];

    /*
    |--------------------------------------------------------------------------
    | Accessors and Mutators
    |--------------------------------------------------------------------------
    |
    | In this section you will find all accessors and mutators of this model.
    |
    */
    
    /**
     * Get the price of the order as float.
     *
     * @return float
     */
    public function getPriceAttribute(): float
    {
        $price = 0;
        foreach ($this->orderItems as $OrderItem) {
            $price += $OrderItem->price;
        }
        return $price;
    }
    
    /**
     * Get the price of the order as int.
     *
     * @return int
     */
    public function getPriceRawAttribute(): int
    {
        $price = 0;
        foreach ($this->orderItems as $OrderItem) {
            $price += $OrderItem->priceRaw;
        }
        return $price;
    }
}
