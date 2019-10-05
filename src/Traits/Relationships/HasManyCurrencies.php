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

use Illuminate\Database\Eloquent\Relations\HasMany;
use Tjventurini\VoyagerShop\Traits\GetRelationshipKey;

trait HasManyCurrencies
{
    use GetRelationshipKey;
    
    /**
     * Relationship with taxes model.
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function taxes(): HasMany
    {
        $key = $this->getRelationshipKey();

        $model = config('voyager-shop.models.currency');
        $country_id = config('voyager-shop.foreign_keys.'.$key);

        return $this->belongsTo($model, $country_id);
    }
}
