<?php

namespace Tjventurini\VoyagerShop\Models;

use Illuminate\Database\Eloquent\Model;
use Tjventurini\VoyagerShop\Traits\GetRelationshipKey;
use Tjventurini\VoyagerShop\Traits\Relationships\BelongsToOrder;
use Tjventurini\VoyagerShop\Traits\Relationships\BelongsToProductVariant;

class OrderItem extends Model
{
    use GetRelationshipKey, BelongsToOrder, BelongsToProductVariant;

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
     * Get the price_raw attribute as float.
     *
     * @return float
     */
    public function getPriceRawAttribute(): float
    {
        return $this->productVariant->priceRaw;
    }
    
    /**
     * Get the price_net attribute as float.
     *
     * @return float
     */
    public function getPriceNetAttribute(): float
    {
        return $this->productVariant->price_net;
    }
    
    /**
     * Get the price_gross attribute as float.
     *
     * @return float
     */
    public function getPriceGrossAttribute(): float
    {
        return $this->productVariant->price_gross;
    }
}
