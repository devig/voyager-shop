<?php

/*
|--------------------------------------------------------------------------
| HasOrders Trait
|--------------------------------------------------------------------------
|
| Trait to add to models that should have a relationship with orders of
| the tjventurini/voyager-shop package.
|
*/

namespace Tjventurini\VoyagerShop\Traits;

use Illuminate\Database\Eloquent\Relations\HasMany;

trait HasOrders
{
    /**
     * Method to establish a relationship with orders.
     *
     * @return HasMany
     */
    public function orders(): HasMany
    {
        $model = config('voyager-shop.models.order');
        $foreign_key = config('voyager-shop.foreign_key.order');
        return $this->hasMany($model, $foreign_key);
    }
}
