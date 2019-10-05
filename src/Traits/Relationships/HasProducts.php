<?php

/*
|--------------------------------------------------------------------------
| HasProducts Trait
|--------------------------------------------------------------------------
|
| Trait to add to models that should have a relationship with products of
| the tjventurini/voyager-shop package.
|
*/

namespace Tjventurini\VoyagerShop\Traits\Relationships;

trait HasProducts
{
    /**
     * Method to establish a relationship with products.
     *
     * @return HasMany
     */
    public function products(): HasMany
    {
        $model = config('voyager-shop.models.product');
        $foreign_key = config('voyager-shop.foreign_key.product');
        return $this->hasMany($model, $foreign_key);
    }
}
