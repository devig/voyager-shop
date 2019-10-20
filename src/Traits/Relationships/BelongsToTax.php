<?php

/*
|--------------------------------------------------------------------------
| BelongsToTax Trait
|--------------------------------------------------------------------------
|
| Trait to add to models that should have a relationship with tax model.
|
*/

namespace Tjventurini\VoyagerShop\Traits\Relationships;

trait BelongsToTax
{

    /**
     * Relationship with tax model.
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function tax(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        $model = config('voyager-shop.models.tax');
        $tax_id = config('voyager-shop.foreign_keys.tax');

        return $this->belongsTo($model, $tax_id);
    }
}
