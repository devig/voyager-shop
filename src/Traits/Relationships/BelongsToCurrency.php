<?php

/*
|--------------------------------------------------------------------------
| BelongsToCurrency Trait
|--------------------------------------------------------------------------
|
| Trait to add to models that should have a relationship with currency
| model.
|
*/

namespace Tjventurini\VoyagerShop\Traits\Relationships;

trait BelongsToCurrency
{
    /**
     * Relationship with currency model.
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function currency(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        $model = config('voyager-shop.models.currency');
        $currency_id = config('voyager-shop.foreign_keys.currency');

        return $this->belongsTo($model, $currency_id);
    }
}
