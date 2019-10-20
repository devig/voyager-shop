<?php

/*
|--------------------------------------------------------------------------
| Shop Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['prefix' => config('voyager.prefix')], function () {
    // create namespace prefix
    $namespace = '\\Tjventurini\\VoyagerShop\\Http\\Controllers\\';

    // create routes
    Route::get('orders', $namespace . 'OrdersController@index')->name('voyager.orders.index');
    Route::get('order_items', $namespace . 'OrderItemsController@index')->name('voyager.order_items.index');
    Route::get('products', $namespace . 'ProductsController@index')->name('voyager.products.index');
    Route::get('product_variants', $namespace . 'ProductVariantsController@index')->name('voyager.product_variants.index');
    Route::get('countries', $namespace . 'CountriesController@index')->name('voyager.countries.index');
    Route::get('currencies', $namespace . 'CurrenciesController@index')->name('voyager.currencies.index');
    Route::get('taxes', $namespace . 'TaxesController@index')->name('voyager.taxes.index');
    Route::get('cards', $namespace . 'CardsController@index')->name('voyager.cards.index');
});

// stripe webhooks
Route::stripeWebhooks('stripe/webhooks');
