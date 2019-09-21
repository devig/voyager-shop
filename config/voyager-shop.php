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
   
    'tables' => [
        'projects' => 'projects',
        'products' => 'products',
        'taxes' => 'taxes',
        'users' => 'users',
        'productVariants' => 'product_variants',
        'orders' => 'orders',
        'countries' => 'countries',
        'cards' => 'cards',
    ],

    'models' => [
        'user' => \App\User::class,
        'project' => \Tjventurini\VoyagerShop\Models\Project::class,
        'country' => \Tjventurini\VoyagerShop\Models\Country::class,
        'tax' => \Tjventurini\VoyagerShop\Models\Tax::class,
        'order' => \Tjventurini\VoyagerShop\Models\Order::class,
        'orderItem' => \Tjventurini\VoyagerShop\Models\OrderItem::class,
        'product' => \Tjventurini\VoyagerShop\Models\Product::class,
        'productVariant' => \Tjventurini\VoyagerShop\Models\ProductVariant::class,
        'card' => \Tjventurini\VoyagerShop\Models\Card::class,
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
        'card' => 'card_id',
    ],

];
