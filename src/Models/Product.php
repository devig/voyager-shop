<?php

namespace Tjventurini\VoyagerShop\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model
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
     * Relationship with tax model.
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function tax(): BelongsTo
    {
        $model = config('voyager-shop.models.tax');
        $tax_id = config('voyager-shop.foreign_keys.tax');

        return $this->belongsTo($model, $tax_id);
    }

    /**
     * Relationship with product variants.
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function productVariants(): HasMany
    {
        $model = config('voyager-shop.models.productVariant');
        $product_id = config('voyager-shop.foreign_keys.product');

        return $this->hasMany($model, $product_id);
    }
}
