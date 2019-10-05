<?php

/*
|--------------------------------------------------------------------------
| HasManyAddresses Trait
|--------------------------------------------------------------------------
|
| Trait to add to models that should have a has many relationship with the
| addresses. Eg. the user model.
|
*/

namespace Tjventurini\VoyagerShop\Traits;

use Tjventurini\VoyagerShop\Traits\GetRelationshipKey;

trait HasManyAddresses
{
    use GetRelationshipKey;
    
    /**
     * HasMany Relationship with the Address model.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function addresses(): HasMany
    {
        $key = $this->getRelationshipKey();
        
        $model = config('voyager-shop.models.address');
        $foreign_key = config('voyager-shop.foreign_keys.'.$key);

        return $this->hasMany($model, $foreign_key);
    }
}
