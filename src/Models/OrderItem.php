<?php

namespace Tjventurini\VoyagerShop\Models;

use Illuminate\Database\Eloquent\Model;
use Tjventurini\VoyagerShop\Traits\Relationships\BelongsToOrder;
use Tjventurini\VoyagerShop\Traits\Relationships\BelongsToProductVariant;

class OrderItem extends Model
{
    use BelongsToOrder, BelongsToProductVariant;

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
}
