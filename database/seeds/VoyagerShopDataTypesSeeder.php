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
            $this->orders();
            $this->orderItems();
            $this->products();
            $this->productVariants();
            $this->countries();
            $this->currencies();
            $this->taxes();
            $this->cards();
            $this->addresses();
            $this->payments();
        });
    }

    /**
     * Create orders data types.
     *
     * @return void
     */
    private function orders(): void
    {
        $orders = DataType::updateOrCreate([
                'slug' => 'orders',
            ], [
                'name' => 'orders',
                'display_name_singular' => trans('shop::orders.label_singular'),
                'display_name_plural' => trans('shop::orders.label_plural'),
                'icon' => 'voyager-basket',
                'model_name' => \Tjventurini\VoyagerShop\Models\Order::class,
                'policy_name' => null,
                'controller' => \Tjventurini\VoyagerShop\Http\Controllers\OrdersController::class,
                'description' => '',
                'generate_permissions' => 1,
                'server_side' => 0,
                'details' => null,
            ]);
    }

    /**
     * Create order items data types.
     *
     * @return void
     */
    private function orderItems(): void
    {
        $orders = DataType::updateOrCreate([
                'slug' => 'order_items',
            ], [
                'name' => 'order_items',
                'display_name_singular' => trans('shop::order-items.label_singular'),
                'display_name_plural' => trans('shop::order-items.label_plural'),
                'icon' => 'voyager-bag',
                'model_name' => \Tjventurini\VoyagerShop\Models\OrderItem::class,
                'policy_name' => null,
                'controller' => \Tjventurini\VoyagerShop\Http\Controllers\OrderItemsController::class,
                'description' => '',
                'generate_permissions' => 1,
                'server_side' => 0,
                'details' => null,
            ]);
    }

    /**
     * Create products data types.
     *
     * @return void
     */
    private function products(): void
    {
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
    }

    /**
     * Create prodict variants data type.
     *
     * @return void
     */
    private function productVariants(): void
    {
        $product_variants = DataType::updateOrCreate([
                'slug' => 'product_variants',
            ], [
                'name' => 'product_variants',
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
    }

    /**
     * Create countries data type.
     *
     * @return void
     */
    private function countries(): void
    {
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
    }

    /**
     * Create currencies data type.
     *
     * @return void
     */
    private function currencies(): void
    {
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
    }

    /**
     * Create taxes data type.
     *
     * @return void
     */
    private function taxes(): void
    {
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
    }

    /**
     * Create cards data type.
     *
     * @return void
     */
    private function cards(): void
    {
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
    }

    /**
     * Create addresses data type.
     *
     * @return void
     */
    private function addresses(): void
    {
        $addresses = DataType::updateOrCreate([
            'slug' => 'addresses'
        ], [
            'name' => 'addresses',
            'display_name_singular' => trans('shop::addresses.label_singular'),
            'display_name_plural' => trans('shop::addresses.label_plural'),
            'icon' => 'voyager-book',
            'model_name' => \Tjventurini\VoyagerShop\Models\Address::class,
            'policy_name' => null,
            'controller' => \Tjventurini\VoyagerShop\Http\Controllers\AddressController::class,
            'description' => '',
            'generate_permissions' => 1,
            'server_side' => 0,
            'details' => null,
        ]);
    }

    /**
     * Method to create payments data type.
     *
     * @return void
     */
    private function payments(): void
    {
        $payments = DataType::updateOrCreate([
            'slug' => 'payments'
        ], [
            'name' => 'payments',
            'display_name_singular' => trans('shop::payments.label_singular'),
            'display_name_plural' => trans('shop::payments.label_plural'),
            'icon' => 'voyager-dollar',
            'model_name' => \Tjventurini\VoyagerShop\Models\Payment::class,
            'policy_name' => null,
            'controller' => \Tjventurini\VoyagerShop\Http\Controllers\PaymentsController::class,
            'description' => '',
            'generate_permissions' => 1,
            'server_side' => 0,
            'details' => null,
        ]);
    }
}
