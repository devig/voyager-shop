<?php

namespace Tjventurini\VoyagerShop\Traits;

use Illuminate\Database\Eloquent\Relations\HasMany;

trait HasCards
{
    /**
     * Relationship with cards.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function cards(): HasMany
    {
        $model = config('voyager-shop.models.card');
        $foreign_key = config('voyager-shop.foreign_keys.user');

        return $this->hasMany($model, $foreign_key);
    }
}
