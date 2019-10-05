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

use Illuminate\Database\Eloquent\Relations\HasMany;
use Tjventurini\VoyagerShop\Traits\GetRelationshipKey;

trait HasManyOrderItems
{
    use GetRelationshipKey;
    
    /**
     * Relationship with orderItems model.
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function orderItems(): HasMany
    {
        $key = $this->getRelationshipKey();

        $model = config('voyager-shop.models.orderItem');
        $country_id = config('voyager-shop.foreign_keys.'.$key);

        return $this->belongsTo($model, $country_id);
    }
}
