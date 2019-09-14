<?php

namespace Tjventurini\VoyagerShop\Models;

use Illuminate\Database\Eloquent\Model;
use Tjventurini\VoyagerShop\Traits\BelongsToUser;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Tjventurini\VoyagerShop\Traits\BelongsToProject;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Order extends Model
{
    use BelongsToProject, BelongsToUser;

    protected $guarded = ['id'];

    protected $attributes = [
        'state' => 'cart',
    ];

    /*
    |--------------------------------------------------------------------------
    | Relationships
    |--------------------------------------------------------------------------
    |
    | In this section you will find all relationships of this model.
    |
    */
    
    /**
     * Relationship with order item model.
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function orderItems(): HasMany
    {
        $model = config('voyager-shop.models.orderItem');
        $order_item_id = config('voyager-shop.foreign_keys.orderItem');

        return $this->belongsTo($model, $order_item_id);
    }
}
