<?php

/*
|--------------------------------------------------------------------------
| Voyager Shop Orders Translation File
|--------------------------------------------------------------------------
|
| In this translation file you will find all strings related to
| the orders.
|
*/

return [
    'label_singular' => 'Order',
    'label_plural' => 'Orders',

    'data_rows' => [
        'id' => 'ID',
        'token' => 'Token',
        'state' => 'State',
        'states' => [
            'cart' => 'Cart',
            'pending' => 'Pending',
            'billed' => 'Billed',
            'canceled' => 'Canceled',
            'declined' => 'Declined',
            'refunded' => 'Refunded',
        ],
        'project' => 'Project',
        'user' => 'User',
        'created_at' => 'Created at',
        'updated_at' => 'Updated at',
    ],

    /*
    |--------------------------------------------------------------------------
    | Order Service
    |--------------------------------------------------------------------------
    |
    | Strings for the Order Service.
    |
    */
    
    'service' => [
        'buy-product-description' => 'Buy :product',
        'buy-cart-description' => 'Buy Order #:id',
    ],
];
