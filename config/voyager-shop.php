<?php

/*
|--------------------------------------------------------------------------
| Voyager Shop Configuration
|--------------------------------------------------------------------------
|
| In this configuration file you will find all options for this package.
|
*/

return [

    /*
    |--------------------------------------------------------------------------
    | Relationships
    |--------------------------------------------------------------------------
    |
    | In this section you will find all options regarding the relationshps of
    | this package.
    |
    */
    
    'tables' => [],

    'models' => [
        'user' => \App\User::class,
        'project' => \Tjventurini\VoyagerShop\Models\Project::class,
        'country' => \Tjventurini\VoyagerShop\Models\Country::class,
        'tax' => \Tjventurini\VoyagerShop\Models\Tax::class,
        'order' => \Tjventurini\VoyagerShop\Models\Order::class,
        'orderItem' => \Tjventurini\VoyagerShop\Models\OrderItem::class,
        'product' => \Tjventurini\VoyagerShop\Models\Product::class,
        'productVariant' => \Tjventurini\VoyagerShop\Models\ProductVariant::class,
    ],

    'foreign_keys' => [
        'user' => 'user_id',
        'project' => 'project_id',
        'country' => 'country_id',
        'tax' => 'tax_id',
        'order' => 'order_id',
        'orderItem' => 'order_item_id',
        'product' => 'product_id',
        'productVariant' => 'product_variant_id',
    ],

];
