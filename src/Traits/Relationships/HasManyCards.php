<?php

namespace Tjventurini\VoyagerShop\Traits\Relationships;

trait HasManyCards
{
    /**
     * Relationship with cards.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function cards(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        $key = $this->getRelationshipKey();

        $model = config('voyager-shop.models.card');
        $foreign_key = config('voyager-shop.foreign_keys.'.$key);

        return $this->hasMany($model, $foreign_key);
    }
}
