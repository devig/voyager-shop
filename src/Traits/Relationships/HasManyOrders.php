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

namespace Tjventurini\VoyagerShop\Traits\Relationships;

trait HasManyOrders
{
    /**
     * Method to establish a relationship with orders.
     *
     * @return HasMany
     */
    public function orders(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        $key = $this->getRelationshipKey();

        $model = config('voyager-shop.models.order');
        $foreign_key = config('voyager-shop.foreign_key.'.$key);
        
        return $this->hasMany($model, $foreign_key);
    }
}
