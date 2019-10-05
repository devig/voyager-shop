<?php

/*
|--------------------------------------------------------------------------
| HasManyTaxes Trait
|--------------------------------------------------------------------------
|
| Trait to add to models that should have a has many relationship with the
| addresses. Eg. the user model.
|
*/

namespace Tjventurini\VoyagerShop\Traits\Relationships;

trait HasManyTaxes
{
    /**
     * Relationship with taxes model.
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function taxes(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        $key = $this->getRelationshipKey();

        $model = config('voyager-shop.models.tax');
        $country_id = config('voyager-shop.foreign_keys.'.$key);

        return $this->hasMany($model, $country_id);
    }
}
