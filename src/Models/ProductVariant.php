<?php

namespace Tjventurini\VoyagerShop\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProductVariant extends Model
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
    public function getPriceAttribute($value): float
    {
        return $value / 100;
    }

    /**
     * Method to set the price of this model as int.
     *
     * @param float $value
     */
    public function setPriceAttribute($value): self
    {
        $this->attributes['price'] = $value * 100;

        return $this;
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
     * Relationship with product model.
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function product(): BelongsTo
    {
        $model = config('voyager-shop.models.product');
        $product_id = config('voyager-shop.foreign_keys.product');

        return $this->belongsTo($model, $product_id);
    }
}
