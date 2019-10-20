<?php

/*
|--------------------------------------------------------------------------
| BelongsToOrder Trait
|--------------------------------------------------------------------------
|
| Trait to add to models that should have a relationship with order model.
|
*/

namespace Tjventurini\VoyagerShop\Traits\Relationships;

trait BelongsToOrder
{
    /**
     * Relationship with order model.
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function order(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        $model = config('voyager-shop.models.order');
        $order_id = config('voyager-shop.foreign_keys.order');

        return $this->belongsTo($model, $order_id);
    }
}
