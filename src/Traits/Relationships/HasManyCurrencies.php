<?php

/*
|--------------------------------------------------------------------------
| HasManyCurrencies Trait
|--------------------------------------------------------------------------
|
| Trait to add to models that should have a has many relationship with the
| addresses. Eg. the user model.
|
*/

namespace Tjventurini\VoyagerShop\Traits\Relationships;

trait HasManyCurrencies
{
    /**
     * Relationship with currencies model.
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function currencies(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        $key = $this->getRelationshipKey();

        $model = config('voyager-shop.models.currency');
        $country_id = config('voyager-shop.foreign_keys.'.$key);

        return $this->hasMany($model, $country_id);
    }
}
