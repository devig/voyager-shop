<?php

namespace Tjventurini\VoyagerShop\Models;

use Illuminate\Database\Eloquent\Model;
use Tjventurini\VoyagerShop\Traits\BelongsToProject;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Tax extends Model
{
    use BelongsToProject;

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
