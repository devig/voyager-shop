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
        'project' => 'projects',
        'products' => 'products',
        'taxes' => 'taxes',
        'users' => 'users',
        'productVariants' => 'product_variants',
        'orders' => 'orders',
        'countries' => 'countries',
        'cards' => 'cards',
        'addresses' => 'addresses',
        'tag' => 'product_tag',
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
        'tag' => \Tjventurini\VoyagerShop\Models\Tag::class,
        'payment' => \Tjventurini\VoyagerShop\Models\Payment::class,
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
        'tag' => 'tag_id',
        'payment' => 'payment_id',
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
            'project_id' => 'sometimes|exists:projects,id',
            'country_id' => 'sometimes|exists:countries,id',
            'country' => 'sometimes|string|size:2|exists:countries,code',
            'user_id' => 'sometimes|exists:users,id',
        ],

        'cards' => [
            'name' => 'required|min:3',
            'brand' => 'required|min:3',
            'last_four' => 'required|digits:4',
            'stripe_id' => 'required|min:3',
            'project_id' => 'sometimes|exists:projects,id',
            'user_id' => 'sometimes|exists:users,id',
        ],

        'countries' => [
            'name' => 'required|min:3',
            'code' => 'required|regex:/^[A-Z]{3}$/',
            'country_belongsto_project_relationship' => 'required|exists:projects,id',
        ],

        'currencies' => [
            'name' => 'required|min:3',
            'code' => 'required|regex:/^[A-Z]{3}$/',
            'sign' => 'required|min:1|max:1',

            'project_id' => 'required|exists:projects,id',
            'country_id' => 'required|exists:countries,id',
        ],

        'order_items' => [
            'order_item_belongsto_product-variant_relationship' => 'required|exists:product_variants,id',
            'quantity' => 'required|numeric|min:1',
            'order_item_belongsto_order_relationship' => 'required|exists:orders,id',
        ],

        'orders' => [
            'state' => 'required|in:cart,pending,billed,canceled,declined,refunded',
            'order_belongsto_project_relationship' => 'required|exists:projects,id',
            'order_belongsto_user_relationship' => 'required|exists:users,id',
        ],

        'products' => [
            'name' => 'required|min:3',
            'slug' => 'required|min:3',
            'description' => 'required|min:3',
            'includes_tax' => 'sometimes|required|in:on,off',
            'project_id' => 'required|exists:projects,id',
            'tax_id' => 'required|exists:taxes,id',
        ],

        'product_variants' => [
            'name' => 'required|min:3',
            'details' => 'required|min:3',
            'price' => 'required|numeric',
            'product_id' => 'required|exists:products,id',
        ],

        'taxes' => [
            'name' => 'required|min:3',
            'tax' => 'required|digits:2',
            'project_id' => 'required|exists:projects,id',
            'country_id' => 'required|exists:countries,id',
        ],

        'payments' => [
            'amount' => 'required|numeric',
            'payment_method' => 'required|string',
            'stripe_id' => 'required|min:3',
            'state' => 'required|string',
            'project_id' => 'sometimes|exists:projects,id',
            'order_id' => 'sometimes|exists:orders,id',
            'user_id' => 'sometimes|exists:users,id',
        ],

    ],
    
];
