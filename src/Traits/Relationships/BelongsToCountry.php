<?php

/*
|--------------------------------------------------------------------------
| BelongsToCountry Trait
|--------------------------------------------------------------------------
|
| Trait to add to models that should have a relationship with user model.
|
*/

namespace Tjventurini\VoyagerShop\Traits\Relationships;

trait BelongsToCountry
{
    /**
     * Relationship with country model.
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function country(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        $model = config('voyager-shop.models.country');
        $country_id = config('voyager-shop.foreign_keys.country');

        return $this->belongsTo($model, $country_id);
    }
}
