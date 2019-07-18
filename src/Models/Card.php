<?php

namespace Tjventurini\VoyagerShop\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Card extends Model
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
     * Relationship with user model.
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        $model = config('voyager-shop.models.user');
        $user_id = config('voyager-shop.foreign_keys.user');

        return $this->belongsTo($model, $user_id);
    }
    
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
