<?php

namespace Tjventurini\VoyagerShop\Models;

use Illuminate\Database\Eloquent\Model;
use Tjventurini\VoyagerShop\Traits\GetRelationshipKey;
use Tjventurini\VoyagerShop\Traits\Relationships\BelongsToProduct;

class ProductVariant extends Model
{
    use GetRelationshipKey, BelongsToProduct;

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
     * Get the price attribute as integer.
     *
     * @return int
     */
    public function getPriceRawAttribute(): int
    {
        return $this->attributes['price'];
    }

    /**
     * Get the price_net attribute as float.
     *
     * @return float
     */
    public function getPriceNetAttribute(): float
    {
        // if price includes taxes, then
        //   calculate price_net value
        if ($this->product->includes_tax) {
            return $this->attributes['price'] / (100 + $this->product->tax->tax) * 100 / 100;
        }

        // otherwise just return the current price
        return $this->attributes['price'] / 100;
    }

    /**
     * Get the price_net_raw attribute as float.
     *
     * @return float
     */
    public function getPriceNetRawAttribute(): float
    {
        // if price includes taxes, then
        //   calculate price_net value
        if ($this->product->includes_tax) {
            return $this->attributes['price'] / (100 + $this->product->tax->tax) * 100;
        }

        // otherwise just return the current price
        return $this->attributes['price'];
    }

    /**
     * Get the price_gross attribute as float.
     *
     * @return float
     */
    public function getPriceGrossAttribute(): float
    {
        // if the price includes the taxes then just return the value
        if ($this->product->includes_tax) {
            return $this->attributes['price'] / 100;
        }

        // otherwise calculate the price_gross value
        return $this->attributes['price'] / 100 * (100 + $this->product->tax->tax) / 100;
    }

    /**
     * Get the price_gross attribute as float.
     *
     * @return float
     */
    public function getPriceGrossRawAttribute(): float
    {
        // if the price includes the taxes then just return the value
        if ($this->product->includes_tax) {
            return $this->attributes['price'];
        }

        // otherwise calculate the price_gross value
        return $this->attributes['price'] / 100 * (100 + $this->product->tax->tax);
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
