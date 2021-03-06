<?php

namespace Tjventurini\VoyagerShop\Models;

use Illuminate\Database\Eloquent\Model;
use Tjventurini\VoyagerShop\Traits\GetRelationshipKey;
use Tjventurini\VoyagerShop\Traits\Relationships\BelongsToUser;
use Tjventurini\VoyagerShop\Traits\Relationships\BelongsToProject;
use Tjventurini\VoyagerShop\Traits\Relationships\HasManyOrderItems;
use Tjventurini\VoyagerShop\Traits\Relationships\BelongsToBillingAddress;
use Tjventurini\VoyagerShop\Traits\Relationships\BelongsToShippingAddress;

class Order extends Model
{
    use GetRelationshipKey,
        BelongsToProject,
        BelongsToUser,
        BelongsToBillingAddress,
        BelongsToShippingAddress,
        HasManyOrderItems;

    protected $guarded = ['id'];

    protected $attributes = [
        'state' => 'cart',
    ];

    protected $appends = [
        'price_net',
        'price_gross',
        'price_raw',
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
    
    /**
     * Get the price_net of the order as float.
     *
     * @return float
     */
    public function getPriceNetAttribute(): float
    {
        $price = 0;
        foreach ($this->orderItems as $OrderItem) {
            $price += $OrderItem->price_net;
        }
        return $price;
    }
    
    /**
     * Get the price_gross of the order as float.
     *
     * @return float
     */
    public function getPriceGrossAttribute(): float
    {
        $price = 0;
        foreach ($this->orderItems as $OrderItem) {
            $price += $OrderItem->price_gross;
        }
        return $price;
    }
}
