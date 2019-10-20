<?php

/*
|--------------------------------------------------------------------------
| BelongsToProductVariant Trait
|--------------------------------------------------------------------------
|
| Trait to add to models that should have a relationship with product_variant model.
|
*/

namespace Tjventurini\VoyagerShop\Traits\Relationships;

trait BelongsToProductVariant
{
    /**
     * Relationship with product variant model.
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function productVariant(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        $model = config('voyager-shop.models.productVariant');
        $product_variant_id = config('voyager-shop.foreign_keys.productVariant');

        return $this->belongsTo($model, $product_variant_id);
    }
}
