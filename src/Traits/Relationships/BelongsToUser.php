<?php

/*
|--------------------------------------------------------------------------
| BelongsToUser Trait
|--------------------------------------------------------------------------
|
| Trait to add to models that should have a relationship with user model.
|
*/

namespace Tjventurini\VoyagerShop\Traits\Relationships;

trait BelongsToUser
{
    /**
     * Relationship with user model.
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        $model = config('voyager-shop.models.user');
        $user_id = config('voyager-shop.foreign_keys.user');

        return $this->belongsTo($model, $user_id);
    }
}
