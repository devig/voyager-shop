<?php

namespace Tjventurini\VoyagerShop\Models;

use Illuminate\Database\Eloquent\Model;
use Tjventurini\VoyagerShop\Traits\BelongsToUser;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Tjventurini\VoyagerShop\Traits\BelongsToProject;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Tjventurini\VoyagerShop\Traits\BelongsToBillingAddress;
use Tjventurini\VoyagerShop\Traits\BelongsToShippingAddress;

class Order extends Model
{
    use BelongsToProject, BelongsToUser, BelongsToBillingAddress, BelongsToShippingAddress;

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

    /*
    |--------------------------------------------------------------------------
    | Relationships
    |--------------------------------------------------------------------------
    |
    | In this section you will find all relationships of this model.
    |
    */
    
    /**
     * Relationship with order item model.
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function orderItems(): HasMany
    {
        $model = config('voyager-shop.models.orderItem');
        $order_id = config('voyager-shop.foreign_keys.order');

        return $this->hasMany($model, $order_id);
    }
}
