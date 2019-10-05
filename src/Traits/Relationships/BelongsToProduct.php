<?php

/*
|--------------------------------------------------------------------------
| BelongsToProduct Trait
|--------------------------------------------------------------------------
|
| Trait to add to models that should have a relationship with product of
| the tjventurini/voyager-shop package.
|
*/

namespace Tjventurini\VoyagerShop\Traits\Relationships;

use Illuminate\Database\Eloquent\Relations\BelongsTo;

trait BelongsToProduct
{
    /**
     * Relationship with product model.
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function product(): BelongsTo
    {
        $model = config('voyager-shop.models.product');
        $product_id = config('voyager-shop.foreign_keys.product');

        return $this->belongsTo($model, $product_id);
    }
}
