<?php

namespace Tjventurini\VoyagerShop\Seeds;

use Illuminate\Database\Seeder;
use TCG\Voyager\Models\DataType;
use Illuminate\Support\Facades\DB;

class VoyagerShopDataTypesSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::transaction(function () {

            // orders
            $orders = DataType::updateOrCreate([
                'slug' => 'orders',
            ], [
                'name' => 'orders',
                'display_name_singular' => trans('shop::orders.label_singular'),
                'display_name_plural' => trans('shop::orders.label_plural'),
                'icon' => 'voyager-bag',
                'model_name' => \Tjventurini\VoyagerShop\Models\Order::class,
                'policy_name' => null,
                'controller' => \Tjventurini\VoyagerShop\Http\Controllers\OrdersController::class,
                'description' => '',
                'generate_permissions' => 1,
                'server_side' => 0,
                'details' => null,
            ]);

            // products
            $products = DataType::updateOrCreate([
                'slug' => 'products',
            ], [
                'name' => 'products',
                'display_name_singular' => trans('shop::products.label_singular'),
                'display_name_plural' => trans('shop::products.label_plural'),
                'icon' => 'voyager-star',
                'model_name' => \Tjventurini\VoyagerShop\Models\Product::class,
                'policy_name' => null,
                'controller' => \Tjventurini\VoyagerShop\Http\Controllers\ProductsController::class,
                'description' => '',
                'generate_permissions' => 1,
                'server_side' => 0,
                'details' => null,
            ]);

            // product-variants
            $product_variants = DataType::updateOrCreate([
                'slug' => 'product-variants',
            ], [
                'name' => 'product-variants',
                'display_name_singular' => trans('shop::product-variants.label_singular'),
                'display_name_plural' => trans('shop::product-variants.label_plural'),
                'icon' => 'voyager-star-half',
                'model_name' => \Tjventurini\VoyagerShop\Models\ProductVariant::class,
                'policy_name' => null,
                'controller' => \Tjventurini\VoyagerShop\Http\Controllers\ProductVariantsController::class,
                'description' => '',
                'generate_permissions' => 1,
                'server_side' => 0,
                'details' => null,
            ]);

            // countries
            $countries = DataType::updateOrCreate([
                'slug' => 'countries',
            ], [
                'name' => 'countries',
                'display_name_singular' => trans('shop::countries.label_singular'),
                'display_name_plural' => trans('shop::countries.label_plural'),
                'icon' => 'voyager-world',
                'model_name' => \Tjventurini\VoyagerShop\Models\Country::class,
                'policy_name' => null,
                'controller' => \Tjventurini\VoyagerShop\Http\Controllers\CountriesController::class,
                'description' => '',
                'generate_permissions' => 1,
                'server_side' => 0,
                'details' => null,
            ]);

            // currencies
            $currencies = DataType::updateOrCreate([
                'slug' => 'currencies',
            ], [
                'name' => 'currencies',
                'display_name_singular' => trans('shop::currencies.label_singular'),
                'display_name_plural' => trans('shop::currencies.label_plural'),
                'icon' => 'voyager-dollar',
                'model_name' => \Tjventurini\VoyagerShop\Models\Currency::class,
                'policy_name' => null,
                'controller' => \Tjventurini\VoyagerShop\Http\Controllers\CurrenciesController::class,
                'description' => '',
                'generate_permissions' => 1,
                'server_side' => 0,
                'details' => null,
            ]);

            // taxes
            $taxes = DataType::updateOrCreate([
                'slug' => 'taxes',
            ], [
                'name' => 'taxes',
                'display_name_singular' => trans('shop::taxes.label_singular'),
                'display_name_plural' => trans('shop::taxes.label_plural'),
                'icon' => 'voyager-pie-chart',
                'model_name' => \Tjventurini\VoyagerShop\Models\Tax::class,
                'policy_name' => null,
                'controller' => \Tjventurini\VoyagerShop\Http\Controllers\TaxesController::class,
                'description' => '',
                'generate_permissions' => 1,
                'server_side' => 0,
                'details' => null,
            ]);

            // cards
            $cards = DataType::updateOrCreate([
                'slug' => 'cards',
            ], [
                'name' => 'cards',
                'display_name_singular' => trans('shop::cards.label_singular'),
                'display_name_plural' => trans('shop::cards.label_plural'),
                'icon' => 'voyager-credit-cards',
                'model_name' => \Tjventurini\VoyagerShop\Models\Card::class,
                'policy_name' => null,
                'controller' => \Tjventurini\VoyagerShop\Http\Controllers\CardsController::class,
                'description' => '',
                'generate_permissions' => 1,
                'server_side' => 0,
                'details' => null,
            ]);
        });
    }
}
