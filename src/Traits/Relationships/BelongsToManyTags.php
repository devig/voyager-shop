<?php

/*
|--------------------------------------------------------------------------
| BelongsToManyTags Trait
|--------------------------------------------------------------------------
|
| Trait to add many to many relationship to models.
|
*/

namespace Tjventurini\VoyagerShop\Traits\Relationships;

use Illuminate\Database\Eloquent\Relations\BelongsToMany;

trait BelongsToManyTags
{
    /**
     * Relationship with project model.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function tags(): BelongsToMany
    {
        $key = $this->getRelationshipKey();
        $model = config('voyager-shop.models.tag');
        $table = config('voyager-shop.tables.' . $key);
        $tag_id = config('voyager-shop.foreign_keys.tag');
        $foreign_key = config('voyager-shop.foreign_keys.' . $key);

        return $this->belongsToMany($model, $table, $foreign_key, $tag_id);
    }
}
