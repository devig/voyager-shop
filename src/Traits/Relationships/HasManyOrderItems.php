<?php

/*
|--------------------------------------------------------------------------
| HasManyOrderItems Trait
|--------------------------------------------------------------------------
|
| Trait to add to models that should have a has many relationship with the
| order items model. Eg. the order model.
|
*/

namespace Tjventurini\VoyagerShop\Traits\Relationships;

use Tjventurini\VoyagerShop\Traits\GetRelationshipKey;

trait HasManyOrderItems
{
    use GetRelationshipKey;
    /**
     * Relationship with orderItems model.
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function orderItems(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        $key = $this->getRelationshipKey();

        $model = config('voyager-shop.models.orderItem');
        $foreign_key = config('voyager-shop.foreign_keys.'.$key);

        return $this->hasMany($model, $foreign_key);
    }
}
