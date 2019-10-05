<?php

namespace Tjventurini\VoyagerShop\Seeds;

use TCG\Voyager\Models\Menu;
use Illuminate\Database\Seeder;
use TCG\Voyager\Models\MenuItem;
use Illuminate\Support\Facades\DB;

class VoyagerShopMenuItemsSeeder extends Seeder
{
    /**
     * Run the voyager tags package database seeders.
     *
     * @return void
     */
    public function run()
    {
        DB::transaction(function () {
            // get the admin menu
            $menu = Menu::where('name', 'admin')->firstOrFail();

            // create shop menu item
            $parentItem = MenuItem::updateOrCreate([
                'title' => trans('shop::shop.label'),
            ], [
                'url' => '',
                'menu_id' => $menu->id,
                'target' => '_self',
                'icon_class' => 'voyager-shop',
                'color' => null,
                'parent_id' => null,
                'order' => 99,
            ]);

            // add menu item to menu
            $menu->items->add($parentItem);
            
            // orders
            $route = 'voyager.orders.index';
            $menuItem = MenuItem::updateOrCreate([
                'route' => $route,
            ], [
                'url' => '',
                'menu_id' => $menu->id,
                'parent_id' => $parentItem->id,
                'target' => '_self',
                'icon_class' => 'voyager-basket',
                'color' => null,
                'order' => 1,
                'title' => trans('shop::orders.label_plural'),
            ]);
            
            // order items
            $route = 'voyager.order_items.index';
            $menuItem = MenuItem::updateOrCreate([
                'route' => $route,
            ], [
                'url' => '',
                'menu_id' => $menu->id,
                'parent_id' => $parentItem->id,
                'target' => '_self',
                'icon_class' => 'voyager-bag',
                'color' => null,
                'order' => 1,
                'title' => trans('shop::order-items.label_plural'),
            ]);

            // products
            $route = 'voyager.products.index';
            $menuItem = MenuItem::updateOrCreate([
                'route' => $route,
            ], [
                'url' => '',
                'menu_id' => $menu->id,
                'parent_id' => $parentItem->id,
                'target' => '_self',
                'icon_class' => 'voyager-star',
                'color' => null,
                'order' => 2,
                'title' => trans('shop::products.label_plural'),
            ]);

            // product variants
            $route = 'voyager.product_variants.index';
            $menuItem = MenuItem::updateOrCreate([
                'route' => $route,
            ], [
                'url' => '',
                'menu_id' => $menu->id,
                'parent_id' => $parentItem->id,
                'target' => '_self',
                'icon_class' => 'voyager-star-half',
                'color' => null,
                'order' => 3,
                'title' => trans('shop::product-variants.label_plural'),
            ]);

            // country
            $route = 'voyager.countries.index';
            $menuItem = MenuItem::updateOrCreate([
                'route' => $route,
            ], [
                'url' => '',
                'menu_id' => $menu->id,
                'parent_id' => $parentItem->id,
                'target' => '_self',
                'icon_class' => 'voyager-world',
                'color' => null,
                'order' => 4,
                'title' => trans('shop::countries.label_plural'),
            ]);

            // currency
            $route = 'voyager.currencies.index';
            $menuItem = MenuItem::updateOrCreate([
                'route' => $route,
            ], [
                'url' => '',
                'menu_id' => $menu->id,
                'parent_id' => $parentItem->id,
                'target' => '_self',
                'icon_class' => 'voyager-dollar',
                'color' => null,
                'order' => 5,
                'title' => trans('shop::currencies.label_plural'),
            ]);

            // taxes
            $route = 'voyager.taxes.index';
            $menuItem = MenuItem::updateOrCreate([
                'route' => $route,
            ], [
                'url' => '',
                'menu_id' => $menu->id,
                'parent_id' => $parentItem->id,
                'target' => '_self',
                'icon_class' => 'voyager-pie-chart',
                'color' => null,
                'order' => 6,
                'title' => trans('shop::taxes.label_plural'),
            ]);

            // cards
            $route = 'voyager.cards.index';
            $menuItem = MenuItem::updateOrCreate([
                'route' => $route,
            ], [
                'url' => '',
                'menu_id' => $menu->id,
                'parent_id' => $parentItem->id,
                'target' => '_self',
                'icon_class' => 'voyager-credit-cards',
                'color' => null,
                'order' => 7,
                'title' => trans('shop::cards.label_plural'),
            ]);

            // addresses
            $route = 'voyager.addresses.index';
            $menuItem = MenuItem::updateOrCreate([
                'route' => $route,
            ], [
                'url' => '',
                'menu_id' => $menu->id,
                'parent_id' => $parentItem->id,
                'target' => '_self',
                'icon_class' => 'voyager-book',
                'color' => null,
                'order' => 7,
                'title' => trans('shop::addresses.label_plural'),
            ]);
        });
    }
}
