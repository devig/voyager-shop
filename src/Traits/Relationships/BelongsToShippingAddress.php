<?php

/*
|--------------------------------------------------------------------------
| BelongsToShippingAddress Trait
|--------------------------------------------------------------------------
|
| Trait to add a relationship with models that need a shipping address.
|
*/

namespace Tjventurini\VoyagerShop\Traits\Relationships;

use Illuminate\Database\Eloquent\Relations\BelongsTo;

trait BelongsToShippingAddress
{
    /**
     * Method to establish a relationship with address as shipping address.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function shippingAddress(): BelongsTo
    {
        $model = config('voyager-shop.models.shippingAddress');
        $foreign_key = config('voyager-shop.foreign_keys.shippingAddress');
        return $this->belongsTo($model, $foreign_key);
    }
}
