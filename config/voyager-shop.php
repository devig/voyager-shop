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
        'addresses' => 'addresses',
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
        'address' => \Tjventurini\VoyagerShop\Models\Address::class,
        'billingAddress' => \Tjventurini\VoyagerShop\Models\Address::class,
        'shippingAddress' => \Tjventurini\VoyagerShop\Models\Address::class,
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
        'address' => 'address_id',
        'billingAddress' => 'billing_address_id',
        'shippingAddress' => 'shipping_address_id',
    ],

    /*
    |--------------------------------------------------------------------------
    | Default Currency
    |--------------------------------------------------------------------------
    |
    | In this section you can set the options for your default currency.
    |
    */

    'currency' => 'usd',
    
    /*
    |--------------------------------------------------------------------------
    | Order States
    |--------------------------------------------------------------------------
    |
    | In this section you can set the states of the orders.
    |
    */
    
    'order_states' => [
        'cart' => 'cart',
        'pending' => 'pending',
        'billed' => 'billed',
        'canceled' => 'canceled',
        'declined' => 'declined',
        'refunded' => 'refunded'
    ],

    /*
    |--------------------------------------------------------------------------
    | Validation
    |--------------------------------------------------------------------------
    |
    | In this section you can overwrite the validation rules used for each
    | entity.
    |
    */
    
    'validation' => [
        'address' => [
            'id' => 'sometimes|exists:addresses,id',
            'name' => 'required|string|min:3',
            'street' => 'required|string|min:3',
            'zip' => 'required|string|min:4',
            'country' => 'required|string|size:2|exists:countries,code',
            'user_id' => 'sometimes|exists:users,id',
        ]
    ],
    
];
