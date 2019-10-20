<?php

/*
|--------------------------------------------------------------------------
| BelongsToBillingAddress Trait
|--------------------------------------------------------------------------
|
| Trait to add a relationship with models that need a billing address.
|
*/

namespace Tjventurini\VoyagerShop\Traits\Relationships;

trait BelongsToBillingAddress
{
    /**
     * Method to establish a relationship with address as billing address.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function billingAddress(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        $model = config('voyager-shop.models.billingAddress');
        $foreign_key = config('voyager-shop.foreign_keys.billingAddress');
        return $this->belongsTo($model, $foreign_key);
    }
}
