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
    Route::get('orders', $namespace . 'OrdersController@index')->name('voyager.shop.orders.index');
    Route::get('products', $namespace . 'ProductsController@index')->name('voyager.shop.products.index');
    Route::get('product-variants', $namespace . 'ProductVariantsController@index')->name('voyager.shop.product-variants.index');
});
