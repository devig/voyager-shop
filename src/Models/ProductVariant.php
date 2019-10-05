<?php

namespace Tjventurini\VoyagerShop\Models;

use Illuminate\Database\Eloquent\Model;
use Tjventurini\VoyagerShop\Traits\Relationships\BelongsToProduct;

class ProductVariant extends Model
{
    use BelongsToProduct;

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
     * Get the price attribute as float.
     *
     * @return float
     */
    public function getPriceRawAttribute(): float
    {
        return $this->attributes['price'];
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
}
