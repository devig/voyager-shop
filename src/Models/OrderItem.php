<?php

namespace Tjventurini\VoyagerShop\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOneThrough;

class OrderItem extends Model
{
    protected $guarded = ['id'];
    
    /*
    |--------------------------------------------------------------------------
    | Accessors and Mutators
    |--------------------------------------------------------------------------
    |
    | In this section you will find the accessors and mutators of this model.
    |
    */
    
    /**
     * Get the price attribute as float.
     *
     * @return float
     */
    public function getPriceAttribute(): float
    {
        return $this->productVariant->price;
    }
    
    /**
     * Get the price attribute as float.
     *
     * @return float
     */
    public function getPriceRawAttribute(): float
    {
        return $this->productVariant->priceRaw;
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
     * Relationship with order model.
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function order(): BelongsTo
    {
        $model = config('voyager-shop.models.order');
        $order_id = config('voyager-shop.foreign_keys.order');

        return $this->belongsTo($model, $order_id);
    }
    
    /**
     * Relationship with product variant model.
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function productVariant(): BelongsTo
    {
        $model = config('voyager-shop.models.productVariant');
        $product_variant_id = config('voyager-shop.foreign_keys.productVariant');

        return $this->belongsTo($model, $product_variant_id);
    }
}
