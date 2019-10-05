<?php

namespace Tjventurini\VoyagerShop\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Tjventurini\VoyagerShop\Traits\BelongsToProject;
use Tjventurini\VoyagerShop\Traits\HasManyAddresses;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Country extends Model
{
    use BelongsToProject, HasManyAddresses;
    
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
     * Relationship with taxes model.
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function taxes(): HasMany
    {
        $model = config('voyager-shop.models.tax');
        $country_id = config('voyager-shop.foreign_keys.country');

        return $this->belongsTo($model, $country_id);
    }
    
    /**
     * Relationship with currencies model.
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function currencies(): HasMany
    {
        $model = config('voyager-shop.models.currency');
        $country_id = config('voyager-shop.foreign_keys.country');

        return $this->belongsTo($model, $country_id);
    }
}
