<?php

namespace Tjventurini\VoyagerShop\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Currency extends Model
{
    protected $guarded = ['id'];

    /*
    |--------------------------------------------------------------------------
    | Relationships
    |--------------------------------------------------------------------------
    |
    | In this section you will find all relationships of this model.
    |
    */
    
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

    /**
     * Relationship with country model.
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function country(): BelongsTo
    {
        $model = config('voyager-shop.models.country');
        $country_id = config('voyager-shop.foreign_keys.country');

        return $this->belongsTo($model, $country_id);
    }
}
