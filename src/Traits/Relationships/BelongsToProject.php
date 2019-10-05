<?php

/*
|--------------------------------------------------------------------------
| BelongsToProject Trait
|--------------------------------------------------------------------------
|
| Trait to add to models that should have a relationship with project of
| the tjventurini/voyager-shop package.
|
*/

namespace Tjventurini\VoyagerShop\Traits\Relationships;

use Illuminate\Database\Eloquent\Relations\BelongsTo;

trait BelongsToProject
{
    /**
     * Relationship with project model.
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function project(): BelongsTo
    {
        $model = config('voyager-shop.models.project');
        $project_id = config('voyager-shop.foreign_keys.project');

        return $this->belongsTo($model, $project_id);
    }
}
