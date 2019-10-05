<?php

namespace Tjventurini\VoyagerShop\Seeds;

use Illuminate\Database\Seeder;
use TCG\Voyager\Models\DataRow;
use TCG\Voyager\Models\DataType;
use Illuminate\Support\Facades\DB;

class VoyagerShopDataRowsSeeder extends Seeder
{
    /**
     * Run the voyager orders package database seeders.
     *
     * @return void
     */
    public function run()
    {
        $this->orders();
        $this->orderItems();
        $this->products();
        $this->productVariants();
        $this->countries();
        $this->taxes();
        $this->currencies();
        $this->cards();
        $this->addresses();
    }

    private function countries()
    {
        DB::transaction(function () {
            // get the data type
            $data_type = DataType::where('slug', 'countries')->firstOrFail();

            // field id
            $field_id = DataRow::updateOrCreate([
                'data_type_id' => $data_type->id,
                'field' => 'id',
            ], [
                'type' => 'hidden',
                'display_name' => trans('shop::countries.data_rows.id'),
                'required' => 1,
                'browse' => 0,
                'read' => 0,
                'edit' => 0,
                'add' => 0,
                'delete' => 0,
                'details' => json_encode([]),
                'order' => 1,
            ]);

            // field name
            $field_name = DataRow::updateOrCreate([
                'data_type_id' => $data_type->id,
                'field' => 'name',
            ], [
                'type' => 'text',
                'display_name' => trans('shop::countries.data_rows.name'),
                'required' => 1,
                'browse' => 1,
                'read' => 1,
                'edit' => 1,
                'add' => 1,
                'delete' => 1,
                'details' => json_encode([]),
                'order' => 1,
            ]);

            // field code
            $field_code = DataRow::updateOrCreate([
                'data_type_id' => $data_type->id,
                'field' => 'code',
            ], [
                'type' => 'text',
                'display_name' => trans('shop::countries.data_rows.code'),
                'required' => 1,
                'browse' => 1,
                'read' => 1,
                'edit' => 1,
                'add' => 1,
                'delete' => 1,
                'details' => json_encode([]),
                'order' => 1,
            ]);

            // field project
            $field_name = DataRow::updateOrCreate([
                'data_type_id' => $data_type->id,
                'field' => 'country_belongsto_project_relationship',
            ], [
                'type' => 'relationship',
                'display_name' => trans('shop::countries.data_rows.project'),
                'required' => 1,
                'browse' => 1,
                'read' => 1,
                'edit' => 1,
                'add' => 1,
                'delete' => 1,
                'details' => [
                    'model' => config('voyager-shop.models.project'),
                    'table' => config('voyager-shop.tables.projects'),
                    'type' => 'belongsTo',
                    'column' => config('voyager-shop.foreign_keys.project'),
                    'key' => 'id',
                    'label' => 'name',
                    'pivot' => 0,
                    'taggable' => 0,
                ],
                'order' => 1,
            ]);

            // field created_at
            $field_created_at = DataRow::updateOrCreate([
                'data_type_id' => $data_type->id,
                'field' => 'created_at',
            ], [
                'type' => 'timestamp',
                'display_name' => trans('shop::countries.data_rows.created_at'),
                'required' => 1,
                'browse' => 0,
                'read' => 1,
                'edit' => 0,
                'add' => 0,
                'delete' => 1,
                'details' => json_encode([]),
                'order' => 1,
            ]);

            // field updated_at
            $field_updated_at = DataRow::updateOrCreate([
                'data_type_id' => $data_type->id,
                'field' => 'updated_at',
            ], [
                'type' => 'timestamp',
                'display_name' => trans('shop::countries.data_rows.updated_at'),
                'required' => 1,
                'browse' => 0,
                'read' => 1,
                'edit' => 0,
                'add' => 0,
                'delete' => 1,
                'details' => json_encode([]),
                'order' => 1,
            ]);
        });
    }

    private function productVariants()
    {
        DB::transaction(function () {
            // get the data type
            $data_type = DataType::where('slug', 'product_variants')->firstOrFail();

            // field id
            $field_id = DataRow::updateOrCreate([
                'data_type_id' => $data_type->id,
                'field' => 'id',
            ], [
                'type' => 'hidden',
                'display_name' => trans('shop::product-variants.data_rows.id'),
                'required' => 1,
                'browse' => 0,
                'read' => 0,
                'edit' => 0,
                'add' => 0,
                'delete' => 0,
                'details' => json_encode([]),
                'order' => 1,
            ]);

            // field name
            $field_id = DataRow::updateOrCreate([
                'data_type_id' => $data_type->id,
                'field' => 'name',
            ], [
                'type' => 'text',
                'display_name' => trans('shop::product-variants.data_rows.name'),
                'required' => 1,
                'browse' => 1,
                'read' => 1,
                'edit' => 1,
                'add' => 1,
                'delete' => 1,
                'details' => json_encode([]),
                'order' => 1,
            ]);

            // field details
            $field_id = DataRow::updateOrCreate([
                'data_type_id' => $data_type->id,
                'field' => 'details',
            ], [
                'type' => 'text_area',
                'display_name' => trans('shop::product-variants.data_rows.details'),
                'required' => 1,
                'browse' => 0,
                'read' => 1,
                'edit' => 1,
                'add' => 1,
                'delete' => 1,
                'details' => json_encode([]),
                'order' => 1,
            ]);

            // field price
            $field_id = DataRow::updateOrCreate([
                'data_type_id' => $data_type->id,
                'field' => 'price',
            ], [
                'type' => 'number',
                'display_name' => trans('shop::product-variants.data_rows.price'),
                'required' => 1,
                'browse' => 1,
                'read' => 1,
                'edit' => 1,
                'add' => 1,
                'delete' => 1,
                'details' => [
                    'step' => 0.01,
                    'min' => 0,
                ],
                'order' => 1,
            ]);

            // field product
            $field_product = DataRow::updateOrCreate([
                'data_type_id' => $data_type->id,
                'field' => 'product_variant_belongsto_product_relationship',
            ], [
                'type' => 'relationship',
                'display_name' => trans('shop::product-variants.data_rows.product'),
                'required' => 1,
                'browse' => 1,
                'read' => 1,
                'edit' => 1,
                'add' => 1,
                'delete' => 1,
                'details' => [
                    'model' => config('voyager-shop.models.product'),
                    'table' => config('voyager-shop.tables.products'),
                    'type' => 'belongsTo',
                    'column' => config('voyager-shop.foreign_keys.product'),
                    'key' => 'id',
                    'label' => 'name',
                    'pivot' => 0,
                    'taggable' => 0,
                ],
                'order' => 1,
            ]);

            // field created_at
            $field_created_at = DataRow::updateOrCreate([
                'data_type_id' => $data_type->id,
                'field' => 'created_at',
            ], [
                'type' => 'timestamp',
                'display_name' => trans('shop::product-variants.data_rows.created_at'),
                'required' => 1,
                'browse' => 0,
                'read' => 1,
                'edit' => 0,
                'add' => 0,
                'delete' => 1,
                'details' => json_encode([]),
                'order' => 1,
            ]);

            // field updated_at
            $field_updated_at = DataRow::updateOrCreate([
                'data_type_id' => $data_type->id,
                'field' => 'updated_at',
            ], [
                'type' => 'timestamp',
                'display_name' => trans('shop::product-variants.data_rows.updated_at'),
                'required' => 1,
                'browse' => 0,
                'read' => 1,
                'edit' => 0,
                'add' => 0,
                'delete' => 1,
                'details' => json_encode([]),
                'order' => 1,
            ]);
        });
    }

    private function products()
    {
        DB::transaction(function () {
            // get the data type
            $data_type = DataType::where('slug', 'products')->firstOrFail();

            // field id
            $field_id = DataRow::updateOrCreate([
                'data_type_id' => $data_type->id,
                'field' => 'id',
            ], [
                'type' => 'hidden',
                'display_name' => trans('shop::products.data_rows.id'),
                'required' => 1,
                'browse' => 0,
                'read' => 0,
                'edit' => 0,
                'add' => 0,
                'delete' => 0,
                'details' => json_encode([]),
                'order' => 1,
            ]);

            // field name
            $field_name = DataRow::updateOrCreate([
                'data_type_id' => $data_type->id,
                'field' => 'name',
            ], [
                'type' => 'text',
                'display_name' => trans('shop::products.data_rows.name'),
                'required' => 1,
                'browse' => 1,
                'read' => 1,
                'edit' => 1,
                'add' => 1,
                'delete' => 1,
                'details' => json_encode([]),
                'order' => 1,
            ]);

            // field slug
            $field_slug = DataRow::updateOrCreate([
                'data_type_id' => $data_type->id,
                'field' => 'slug',
            ], [
                'type' => 'text',
                'display_name' => trans('shop::products.data_rows.slug'),
                'required' => 1,
                'browse' => 0,
                'read' => 1,
                'edit' => 1,
                'add' => 1,
                'delete' => 1,
                'details' => json_encode([]),
                'order' => 1,
            ]);

            // field description
            $field_description = DataRow::updateOrCreate([
                'data_type_id' => $data_type->id,
                'field' => 'description',
            ], [
                'type' => 'text_area',
                'display_name' => trans('shop::products.data_rows.description'),
                'required' => 1,
                'browse' => 0,
                'read' => 1,
                'edit' => 1,
                'add' => 1,
                'delete' => 1,
                'details' => json_encode([]),
                'order' => 1,
            ]);

            // field includes_tax
            $field_includes_tax = DataRow::updateOrCreate([
                'data_type_id' => $data_type->id,
                'field' => 'includes_tax',
            ], [
                'type' => 'checkbox',
                'display_name' => trans('shop::products.data_rows.includes_tax'),
                'required' => 1,
                'browse' => 0,
                'read' => 1,
                'edit' => 1,
                'add' => 1,
                'delete' => 1,
                'details' => [
                    'checked' => false,
                ],
                'order' => 1,
            ]);

            // field project
            $field_project = DataRow::updateOrCreate([
                'data_type_id' => $data_type->id,
                'field' => 'product_belongsto_project_relationship',
            ], [
                'type' => 'relationship',
                'display_name' => trans('shop::products.data_rows.project'),
                'required' => 1,
                'browse' => 1,
                'read' => 1,
                'edit' => 1,
                'add' => 1,
                'delete' => 1,
                'details' => [
                    'model' => config('voyager-shop.models.project'),
                    'table' => config('voyager-shop.tables.projects'),
                    'type' => 'belongsTo',
                    'column' => config('voyager-shop.foreign_keys.project'),
                    'key' => 'id',
                    'label' => 'name',
                    'pivot' => 0,
                    'taggable' => 0,
                ],
                'order' => 1,
            ]);

            // field tax
            $field_tax = DataRow::updateOrCreate([
                'data_type_id' => $data_type->id,
                'field' => 'product_belongsto_tax_relationship',
            ], [
                'type' => 'relationship',
                'display_name' => trans('shop::products.data_rows.tax'),
                'required' => 1,
                'browse' => 0,
                'read' => 1,
                'edit' => 1,
                'add' => 1,
                'delete' => 1,
                'details' => [
                    'model' => config('voyager-shop.models.tax'),
                    'table' => config('voyager-shop.tables.taxes'),
                    'type' => 'belongsTo',
                    'column' => config('voyager-shop.foreign_keys.tax'),
                    'key' => 'id',
                    'label' => 'name',
                    'pivot' => 0,
                    'taggable' => 0,
                ],
                'order' => 1,
            ]);

            // field created_at
            $field_created_at = DataRow::updateOrCreate([
                'data_type_id' => $data_type->id,
                'field' => 'created_at',
            ], [
                'type' => 'timestamp',
                'display_name' => trans('shop::products.data_rows.created_at'),
                'required' => 1,
                'browse' => 0,
                'read' => 1,
                'edit' => 0,
                'add' => 0,
                'delete' => 1,
                'details' => json_encode([]),
                'order' => 1,
            ]);

            // field updated_at
            $field_updated_at = DataRow::updateOrCreate([
                'data_type_id' => $data_type->id,
                'field' => 'updated_at',
            ], [
                'type' => 'timestamp',
                'display_name' => trans('shop::products.data_rows.updated_at'),
                'required' => 1,
                'browse' => 0,
                'read' => 1,
                'edit' => 0,
                'add' => 0,
                'delete' => 1,
                'details' => json_encode([]),
                'order' => 1,
            ]);
        });
    }

    private function orders()
    {
        DB::transaction(function () {
            // get the data type
            $data_type = DataType::where('slug', 'orders')->firstOrFail();

            // field id
            $field_id = DataRow::updateOrCreate([
                'data_type_id' => $data_type->id,
                'field' => 'id',
            ], [
                'type' => 'hidden',
                'display_name' => trans('shop::orders.data_rows.id'),
                'required' => 1,
                'browse' => 0,
                'read' => 0,
                'edit' => 0,
                'add' => 0,
                'delete' => 0,
                'details' => json_encode([]),
                'order' => 1,
            ]);

            // field token
            $field_token = DataRow::updateOrCreate([
                'data_type_id' => $data_type->id,
                'field' => 'token',
            ], [
                'type' => 'hidden',
                'display_name' => trans('shop::orders.data_rows.token'),
                'required' => 1,
                'browse' => 0,
                'read' => 1,
                'edit' => 0,
                'add' => 0,
                'delete' => 1,
                'details' => json_encode([]),
                'order' => 1,
            ]);

            // field state
            $field_slug = DataRow::updateOrCreate([
                'data_type_id' => $data_type->id,
                'field' => 'state',
            ], [
                'type' => 'select_dropdown',
                'display_name' => trans('shop::orders.data_rows.state'),
                'required' => 1,
                'browse' => 1,
                'read' => 1,
                'edit' => 1,
                'add' => 1,
                'delete' => 1,
                'details' => [
                    'default' => 'cart',
                    'options' => [
                        'cart' => trans('shop::orders.data_rows.states.cart'),
                        'pending' => trans('shop::orders.data_rows.states.pending'),
                        'billed' => trans('shop::orders.data_rows.states.billed'),
                        'canceled' => trans('shop::orders.data_rows.states.canceled'),
                        'declined' => trans('shop::orders.data_rows.states.declined'),
                        'refunded' => trans('shop::orders.data_rows.states.refunded'),
                    ]
                ],
                'order' => 1,
            ]);

            // field project
            $field_name = DataRow::updateOrCreate([
                'data_type_id' => $data_type->id,
                'field' => 'order_belongsto_project_relationship',
            ], [
                'type' => 'relationship',
                'display_name' => trans('shop::orders.data_rows.project'),
                'required' => 1,
                'browse' => 1,
                'read' => 1,
                'edit' => 1,
                'add' => 1,
                'delete' => 1,
                'details' => [
                    'model' => config('voyager-shop.models.project'),
                    'table' => config('voyager-shop.tables.projects'),
                    'type' => 'belongsTo',
                    'column' => config('voyager-shop.foreign_keys.project'),
                    'key' => 'id',
                    'label' => 'name',
                    'pivot' => 0,
                    'taggable' => 0,
                ],
                'order' => 1,
            ]);

            // field user
            $field_user = DataRow::updateOrCreate([
                'data_type_id' => $data_type->id,
                'field' => 'order_belongsto_user_relationship',
            ], [
                'type' => 'relationship',
                'display_name' => trans('shop::orders.data_rows.user'),
                'required' => 1,
                'browse' => 1,
                'read' => 1,
                'edit' => 1,
                'add' => 1,
                'delete' => 1,
                'details' => [
                    'model' => config('voyager-shop.models.user'),
                    'table' => config('voyager-shop.tables.users'),
                    'type' => 'belongsTo',
                    'column' => config('voyager-shop.foreign_keys.user'),
                    'key' => 'id',
                    'label' => 'name',
                    'pivot' => 0,
                    'taggable' => 0,
                ],
                'order' => 1,
            ]);

            // field created_at
            $field_created_at = DataRow::updateOrCreate([
                'data_type_id' => $data_type->id,
                'field' => 'created_at',
            ], [
                'type' => 'timestamp',
                'display_name' => trans('shop::orders.data_rows.created_at'),
                'required' => 1,
                'browse' => 0,
                'read' => 1,
                'edit' => 0,
                'add' => 0,
                'delete' => 1,
                'details' => json_encode([]),
                'order' => 1,
            ]);

            // field updated_at
            $field_updated_at = DataRow::updateOrCreate([
                'data_type_id' => $data_type->id,
                'field' => 'updated_at',
            ], [
                'type' => 'timestamp',
                'display_name' => trans('shop::orders.data_rows.updated_at'),
                'required' => 1,
                'browse' => 0,
                'read' => 1,
                'edit' => 0,
                'add' => 0,
                'delete' => 1,
                'details' => json_encode([]),
                'order' => 1,
            ]);
        });
    }

    /**
     * Create data rows for the order items type.
     *
     * @return void
     */
    private function orderItems(): void
    {
        DB::transaction(function () {

            // get the data type
            $data_type = DataType::where('slug', 'order_items')->firstOrFail();

            // field id
            $field_id = DataRow::updateOrCreate([
                'data_type_id' => $data_type->id,
                'field' => 'id',
            ], [
                'type' => 'hidden',
                'display_name' => trans('shop::order-items.data_rows.id'),
                'required' => 1,
                'browse' => 0,
                'read' => 0,
                'edit' => 0,
                'add' => 0,
                'delete' => 0,
                'details' => json_encode([]),
                'order' => 1,
            ]);

            // field product-variant
            $field_name = DataRow::updateOrCreate([
                'data_type_id' => $data_type->id,
                'field' => 'order_item_belongsto_product-variant_relationship',
            ], [
                'type' => 'relationship',
                'display_name' => trans('shop::order-items.data_rows.product-variant'),
                'required' => 1,
                'browse' => 1,
                'read' => 1,
                'edit' => 1,
                'add' => 1,
                'delete' => 1,
                'details' => [
                    'model' => config('voyager-shop.models.productVariant'),
                    'table' => config('voyager-shop.tables.productVariants'),
                    'type' => 'belongsTo',
                    'column' => config('voyager-shop.foreign_keys.productVariant'),
                    'key' => 'id',
                    'label' => 'name',
                    'pivot' => 0,
                    'taggable' => 0,
                ],
                'order' => 1,
            ]);

            // field quantity
            $field_quantity = DataRow::updateOrCreate([
                'data_type_id' => $data_type->id,
                'field' => 'quantity',
            ], [
                'type' => 'number',
                'display_name' => trans('shop::order-items.data_rows.quantity'),
                'required' => 1,
                'browse' => 1,
                'read' => 1,
                'edit' => 1,
                'add' => 1,
                'delete' => 1,
                'details' => [
                    'step' => 1,
                    'min' => 1,
                ],
                'order' => 1,
            ]);

            // field order
            $field_name = DataRow::updateOrCreate([
                'data_type_id' => $data_type->id,
                'field' => 'order_item_belongsto_order_relationship',
            ], [
                'type' => 'relationship',
                'display_name' => trans('shop::order-items.data_rows.order'),
                'required' => 1,
                'browse' => 0,
                'read' => 1,
                'edit' => 1,
                'add' => 1,
                'delete' => 1,
                'details' => [
                    'model' => config('voyager-shop.models.order'),
                    'table' => config('voyager-shop.tables.orders'),
                    'type' => 'belongsTo',
                    'column' => config('voyager-shop.foreign_keys.order'),
                    'key' => 'id',
                    'label' => 'token',
                    'pivot' => 0,
                    'taggable' => 0,
                ],
                'order' => 1,
            ]);

            // field created_at
            $field_created_at = DataRow::updateOrCreate([
                'data_type_id' => $data_type->id,
                'field' => 'created_at',
            ], [
                'type' => 'timestamp',
                'display_name' => trans('shop::order-items.data_rows.created_at'),
                'required' => 1,
                'browse' => 0,
                'read' => 1,
                'edit' => 0,
                'add' => 0,
                'delete' => 1,
                'details' => json_encode([]),
                'order' => 1,
            ]);

            // field updated_at
            $field_updated_at = DataRow::updateOrCreate([
                'data_type_id' => $data_type->id,
                'field' => 'updated_at',
            ], [
                'type' => 'timestamp',
                'display_name' => trans('shop::order-items.data_rows.updated_at'),
                'required' => 1,
                'browse' => 0,
                'read' => 1,
                'edit' => 0,
                'add' => 0,
                'delete' => 1,
                'details' => json_encode([]),
                'order' => 1,
            ]);
        });
    }

    /**
     * Create the data rows for the taxes data type.
     *
     * @return void
     */
    private function taxes(): void
    {
        DB::transaction(function () {
            // get the data type
            $data_type = DataType::where('slug', 'taxes')->firstOrFail();

            // field id
            $field_id = DataRow::updateOrCreate([
                'data_type_id' => $data_type->id,
                'field' => 'id',
            ], [
                'type' => 'hidden',
                'display_name' => trans('shop::taxes.data_rows.id'),
                'required' => 1,
                'browse' => 0,
                'read' => 0,
                'edit' => 0,
                'add' => 0,
                'delete' => 0,
                'details' => json_encode([]),
                'order' => 1,
            ]);

            // field name
            $field_name = DataRow::updateOrCreate([
                'data_type_id' => $data_type->id,
                'field' => 'name',
            ], [
                'type' => 'text',
                'display_name' => trans('shop::taxes.data_rows.name'),
                'required' => 1,
                'browse' => 1,
                'read' => 1,
                'edit' => 1,
                'add' => 1,
                'delete' => 1,
                'details' => json_encode([]),
                'order' => 1,
            ]);

            // field id
            $field_id = DataRow::updateOrCreate([
                'data_type_id' => $data_type->id,
                'field' => 'tax',
            ], [
                'type' => 'number',
                'display_name' => trans('shop::taxes.data_rows.tax'),
                'required' => 1,
                'browse' => 1,
                'read' => 1,
                'edit' => 1,
                'add' => 1,
                'delete' => 1,
                'details' => [
                    "step" => 0.01
                ],
                'order' => 1,
            ]);

            // field project
            $field_name = DataRow::updateOrCreate([
                'data_type_id' => $data_type->id,
                'field' => 'tax_belongsto_project_relationship',
            ], [
                'type' => 'relationship',
                'display_name' => trans('shop::taxes.data_rows.project'),
                'required' => 1,
                'browse' => 1,
                'read' => 1,
                'edit' => 1,
                'add' => 1,
                'delete' => 1,
                'details' => [
                    'model' => config('voyager-shop.models.project'),
                    'table' => config('voyager-shop.tables.projects'),
                    'type' => 'belongsTo',
                    'column' => config('voyager-shop.foreign_keys.project'),
                    'key' => 'id',
                    'label' => 'name',
                    'pivot' => 0,
                    'taggable' => 0,
                ],
                'order' => 1,
            ]);

            // field country
            $field_name = DataRow::updateOrCreate([
                'data_type_id' => $data_type->id,
                'field' => 'tax_belongsto_country_relationship',
            ], [
                'type' => 'relationship',
                'display_name' => trans('shop::taxes.data_rows.country'),
                'required' => 1,
                'browse' => 1,
                'read' => 1,
                'edit' => 1,
                'add' => 1,
                'delete' => 1,
                'details' => [
                    'model' => config('voyager-shop.models.country'),
                    'table' => config('voyager-shop.tables.countries'),
                    'type' => 'belongsTo',
                    'column' => config('voyager-shop.foreign_keys.country'),
                    'key' => 'id',
                    'label' => 'name',
                    'pivot' => 0,
                    'taggable' => 0,
                ],
                'order' => 1,
            ]);

            // field created_at
            $field_created_at = DataRow::updateOrCreate([
                'data_type_id' => $data_type->id,
                'field' => 'created_at',
            ], [
                'type' => 'timestamp',
                'display_name' => trans('shop::taxes.data_rows.created_at'),
                'required' => 1,
                'browse' => 0,
                'read' => 1,
                'edit' => 0,
                'add' => 0,
                'delete' => 1,
                'details' => json_encode([]),
                'order' => 1,
            ]);

            // field updated_at
            $field_updated_at = DataRow::updateOrCreate([
                'data_type_id' => $data_type->id,
                'field' => 'updated_at',
            ], [
                'type' => 'timestamp',
                'display_name' => trans('shop::taxes.data_rows.updated_at'),
                'required' => 1,
                'browse' => 0,
                'read' => 1,
                'edit' => 0,
                'add' => 0,
                'delete' => 1,
                'details' => json_encode([]),
                'order' => 1,
            ]);
        });
    }

    /**
     * Create the data rows for the currencies.
     *
     * @return void
     */
    private function currencies(): void
    {
        DB::transaction(function () {
            // get the data type
            $data_type = DataType::where('slug', 'currencies')->firstOrFail();

            // field id
            $field_id = DataRow::updateOrCreate([
                'data_type_id' => $data_type->id,
                'field' => 'id',
            ], [
                'type' => 'hidden',
                'display_name' => trans('shop::currencies.data_rows.id'),
                'required' => 1,
                'browse' => 0,
                'read' => 0,
                'edit' => 0,
                'add' => 0,
                'delete' => 0,
                'details' => json_encode([]),
                'order' => 1,
            ]);

            // field name
            $field_name = DataRow::updateOrCreate([
                'data_type_id' => $data_type->id,
                'field' => 'name',
            ], [
                'type' => 'text',
                'display_name' => trans('shop::currencies.data_rows.name'),
                'required' => 1,
                'browse' => 1,
                'read' => 1,
                'edit' => 1,
                'add' => 1,
                'delete' => 1,
                'details' => json_encode([]),
                'order' => 1,
            ]);

            // field code
            $field_code = DataRow::updateOrCreate([
                'data_type_id' => $data_type->id,
                'field' => 'code',
            ], [
                'type' => 'text',
                'display_name' => trans('shop::currencies.data_rows.code'),
                'required' => 1,
                'browse' => 1,
                'read' => 1,
                'edit' => 1,
                'add' => 1,
                'delete' => 1,
                'details' => json_encode([]),
                'order' => 1,
            ]);

            // field sign
            $field_sign = DataRow::updateOrCreate([
                'data_type_id' => $data_type->id,
                'field' => 'sign',
            ], [
                'type' => 'text',
                'display_name' => trans('shop::currencies.data_rows.sign'),
                'required' => 1,
                'browse' => 1,
                'read' => 1,
                'edit' => 1,
                'add' => 1,
                'delete' => 1,
                'details' => json_encode([]),
                'order' => 1,
            ]);

            // field project
            $field_name = DataRow::updateOrCreate([
                'data_type_id' => $data_type->id,
                'field' => 'currency_belongsto_project_relationship',
            ], [
                'type' => 'relationship',
                'display_name' => trans('shop::currencies.data_rows.project'),
                'required' => 1,
                'browse' => 1,
                'read' => 1,
                'edit' => 1,
                'add' => 1,
                'delete' => 1,
                'details' => [
                    'model' => config('voyager-shop.models.project'),
                    'table' => config('voyager-shop.tables.projects'),
                    'type' => 'belongsTo',
                    'column' => config('voyager-shop.foreign_keys.project'),
                    'key' => 'id',
                    'label' => 'name',
                    'pivot' => 0,
                    'taggable' => 0,
                ],
                'order' => 1,
            ]);

            // field country
            $field_name = DataRow::updateOrCreate([
                'data_type_id' => $data_type->id,
                'field' => 'currency_belongsto_country_relationship',
            ], [
                'type' => 'relationship',
                'display_name' => trans('shop::currencies.data_rows.country'),
                'required' => 1,
                'browse' => 1,
                'read' => 1,
                'edit' => 1,
                'add' => 1,
                'delete' => 1,
                'details' => [
                    'model' => config('voyager-shop.models.country'),
                    'table' => config('voyager-shop.tables.countries'),
                    'type' => 'belongsTo',
                    'column' => config('voyager-shop.foreign_keys.country'),
                    'key' => 'id',
                    'label' => 'name',
                    'pivot' => 0,
                    'taggable' => 0,
                ],
                'order' => 1,
            ]);

            // field created_at
            $field_created_at = DataRow::updateOrCreate([
                'data_type_id' => $data_type->id,
                'field' => 'created_at',
            ], [
                'type' => 'timestamp',
                'display_name' => trans('shop::currencies.data_rows.created_at'),
                'required' => 1,
                'browse' => 0,
                'read' => 1,
                'edit' => 0,
                'add' => 0,
                'delete' => 1,
                'details' => json_encode([]),
                'order' => 1,
            ]);

            // field updated_at
            $field_updated_at = DataRow::updateOrCreate([
                'data_type_id' => $data_type->id,
                'field' => 'updated_at',
            ], [
                'type' => 'timestamp',
                'display_name' => trans('shop::currencies.data_rows.updated_at'),
                'required' => 1,
                'browse' => 0,
                'read' => 1,
                'edit' => 0,
                'add' => 0,
                'delete' => 1,
                'details' => json_encode([]),
                'order' => 1,
            ]);
        });
    }

    /**
     * Create data rows for cards.
     *
     * @return void
     */
    private function cards(): void
    {
        DB::transaction(function () {
            // get the data type
            $data_type = DataType::where('slug', 'cards')->firstOrFail();

            // field id
            $field_id = DataRow::updateOrCreate([
                'data_type_id' => $data_type->id,
                'field' => 'id',
            ], [
                'type' => 'hidden',
                'display_name' => trans('shop::cards.data_rows.id'),
                'required' => 1,
                'browse' => 0,
                'read' => 0,
                'edit' => 0,
                'add' => 0,
                'delete' => 0,
                'details' => json_encode([]),
                'order' => 1,
            ]);

            // field name
            $field_id = DataRow::updateOrCreate([
                'data_type_id' => $data_type->id,
                'field' => 'name',
            ], [
                'type' => 'text',
                'display_name' => trans('shop::cards.data_rows.name'),
                'required' => 1,
                'browse' => 1,
                'read' => 1,
                'edit' => 1,
                'add' => 1,
                'delete' => 1,
                'details' => json_encode([]),
                'order' => 1,
            ]);

            // field brand
            $field_id = DataRow::updateOrCreate([
                'data_type_id' => $data_type->id,
                'field' => 'brand',
            ], [
                'type' => 'text',
                'display_name' => trans('shop::cards.data_rows.brand'),
                'required' => 1,
                'browse' => 1,
                'read' => 1,
                'edit' => 1,
                'add' => 1,
                'delete' => 1,
                'details' => json_encode([]),
                'order' => 1,
            ]);

            // field last_four
            $field_id = DataRow::updateOrCreate([
                'data_type_id' => $data_type->id,
                'field' => 'last_four',
            ], [
                'type' => 'text',
                'display_name' => trans('shop::cards.data_rows.last_four'),
                'required' => 1,
                'browse' => 1,
                'read' => 1,
                'edit' => 1,
                'add' => 1,
                'delete' => 1,
                'details' => json_encode([]),
                'order' => 1,
            ]);

            // field stripe_id
            $field_id = DataRow::updateOrCreate([
                'data_type_id' => $data_type->id,
                'field' => 'stripe_id',
            ], [
                'type' => 'text',
                'display_name' => trans('shop::cards.data_rows.stripe_id'),
                'required' => 1,
                'browse' => 0,
                'read' => 1,
                'edit' => 1,
                'add' => 1,
                'delete' => 1,
                'details' => json_encode([]),
                'order' => 1,
            ]);

            // field project
            $field_name = DataRow::updateOrCreate([
                'data_type_id' => $data_type->id,
                'field' => 'card_belongsto_project_relationship',
            ], [
                'type' => 'relationship',
                'display_name' => trans('shop::cards.data_rows.project'),
                'required' => 1,
                'browse' => 1,
                'read' => 1,
                'edit' => 1,
                'add' => 1,
                'delete' => 1,
                'details' => [
                    'model' => config('voyager-shop.models.project'),
                    'table' => config('voyager-shop.tables.projects'),
                    'type' => 'belongsTo',
                    'column' => config('voyager-shop.foreign_keys.project'),
                    'key' => 'id',
                    'label' => 'name',
                    'pivot' => 0,
                    'taggable' => 0,
                ],
                'order' => 1,
            ]);

            // field user
            $field_user = DataRow::updateOrCreate([
                'data_type_id' => $data_type->id,
                'field' => 'card_belongsto_user_relationship',
            ], [
                'type' => 'relationship',
                'display_name' => trans('shop::cards.data_rows.user'),
                'required' => 1,
                'browse' => 1,
                'read' => 1,
                'edit' => 1,
                'add' => 1,
                'delete' => 1,
                'details' => [
                    'model' => config('voyager-shop.models.user'),
                    'table' => config('voyager-shop.tables.users'),
                    'type' => 'belongsTo',
                    'column' => config('voyager-shop.foreign_keys.user'),
                    'key' => 'id',
                    'label' => 'name',
                    'pivot' => 0,
                    'taggable' => 0,
                ],
                'order' => 1,
            ]);

            // field created_at
            $field_created_at = DataRow::updateOrCreate([
                'data_type_id' => $data_type->id,
                'field' => 'created_at',
            ], [
                'type' => 'timestamp',
                'display_name' => trans('shop::cards.data_rows.created_at'),
                'required' => 1,
                'browse' => 0,
                'read' => 1,
                'edit' => 0,
                'add' => 0,
                'delete' => 1,
                'details' => json_encode([]),
                'order' => 1,
            ]);

            // field updated_at
            $field_updated_at = DataRow::updateOrCreate([
                'data_type_id' => $data_type->id,
                'field' => 'updated_at',
            ], [
                'type' => 'timestamp',
                'display_name' => trans('shop::cards.data_rows.updated_at'),
                'required' => 1,
                'browse' => 0,
                'read' => 1,
                'edit' => 0,
                'add' => 0,
                'delete' => 1,
                'details' => json_encode([]),
                'order' => 1,
            ]);
        });
    }

    /**
     * Create address data rows.
     *
     * @return void
     */
    private function addresses(): void
    {
        DB::transaction(function () {
            // get the data type
            $data_type = DataType::where('slug', 'addresses')->firstOrFail();

            // field id
            $field_id = DataRow::updateOrCreate([
                'data_type_id' => $data_type->id,
                'field' => 'id',
            ], [
                'type' => 'hidden',
                'display_name' => trans('shop::addresses.data_rows.id'),
                'required' => 1,
                'browse' => 0,
                'read' => 0,
                'edit' => 0,
                'add' => 0,
                'delete' => 0,
                'details' => json_encode([]),
                'order' => 1,
            ]);

            // field name
            $field_name = DataRow::updateOrCreate([
                'data_type_id' => $data_type->id,
                'field' => 'name',
            ], [
                'type' => 'text',
                'display_name' => trans('shop::addresses.data_rows.name'),
                'required' => 1,
                'browse' => 1,
                'read' => 1,
                'edit' => 1,
                'add' => 1,
                'delete' => 1,
                'details' => json_encode([]),
                'order' => 1,
            ]);

            // field street
            $field_street = DataRow::updateOrCreate([
                'data_type_id' => $data_type->id,
                'field' => 'street',
            ], [
                'type' => 'text',
                'display_name' => trans('shop::addresses.data_rows.street'),
                'required' => 1,
                'browse' => 1,
                'read' => 1,
                'edit' => 1,
                'add' => 1,
                'delete' => 1,
                'details' => json_encode([]),
                'order' => 1,
            ]);

            // field zip
            $field_zip = DataRow::updateOrCreate([
                'data_type_id' => $data_type->id,
                'field' => 'zip',
            ], [
                'type' => 'text',
                'display_name' => trans('shop::addresses.data_rows.zip'),
                'required' => 1,
                'browse' => 1,
                'read' => 1,
                'edit' => 1,
                'add' => 1,
                'delete' => 1,
                'details' => json_encode([]),
                'order' => 1,
            ]);

            // field country
            $field_country = DataRow::updateOrCreate([
                'data_type_id' => $data_type->id,
                'field' => 'address_belongsto_country_relationship',
            ], [
                'type' => 'relationship',
                'display_name' => trans('shop::addresses.data_rows.country'),
                'required' => 1,
                'browse' => 1,
                'read' => 1,
                'edit' => 1,
                'add' => 1,
                'delete' => 1,
                'details' => [
                    'model' => config('voyager-shop.models.country'),
                    'table' => config('voyager-shop.tables.countries'),
                    'type' => 'belongsTo',
                    'column' => config('voyager-shop.foreign_keys.country'),
                    'key' => 'id',
                    'label' => 'name',
                    'pivot' => 0,
                    'taggable' => 0,
                ],
                'order' => 1,
            ]);

            // field project
            $field_project = DataRow::updateOrCreate([
                'data_type_id' => $data_type->id,
                'field' => 'address_belongsto_project_relationship',
            ], [
                'type' => 'relationship',
                'display_name' => trans('shop::addresses.data_rows.project'),
                'required' => 1,
                'browse' => 1,
                'read' => 1,
                'edit' => 1,
                'add' => 1,
                'delete' => 1,
                'details' => [
                    'model' => config('voyager-shop.models.project'),
                    'table' => config('voyager-shop.tables.projects'),
                    'type' => 'belongsTo',
                    'column' => config('voyager-shop.foreign_keys.project'),
                    'key' => 'id',
                    'label' => 'name',
                    'pivot' => 0,
                    'taggable' => 0,
                ],
                'order' => 1,
            ]);

            // field user
            $field_user = DataRow::updateOrCreate([
                'data_type_id' => $data_type->id,
                'field' => 'address_belongsto_user_relationship',
            ], [
                'type' => 'relationship',
                'display_name' => trans('shop::addresses.data_rows.user'),
                'required' => 1,
                'browse' => 1,
                'read' => 1,
                'edit' => 1,
                'add' => 1,
                'delete' => 1,
                'details' => [
                    'model' => config('voyager-shop.models.user'),
                    'table' => config('voyager-shop.tables.users'),
                    'type' => 'belongsTo',
                    'column' => config('voyager-shop.foreign_keys.user'),
                    'key' => 'id',
                    'label' => 'name',
                    'pivot' => 0,
                    'taggable' => 0,
                ],
                'order' => 1,
            ]);

            // field created_at
            $field_created_at = DataRow::updateOrCreate([
                'data_type_id' => $data_type->id,
                'field' => 'created_at',
            ], [
                'type' => 'timestamp',
                'display_name' => trans('shop::addresses.data_rows.created_at'),
                'required' => 1,
                'browse' => 0,
                'read' => 1,
                'edit' => 0,
                'add' => 0,
                'delete' => 1,
                'details' => json_encode([]),
                'order' => 1,
            ]);

            // field updated_at
            $field_updated_at = DataRow::updateOrCreate([
                'data_type_id' => $data_type->id,
                'field' => 'updated_at',
            ], [
                'type' => 'timestamp',
                'display_name' => trans('shop::addresses.data_rows.updated_at'),
                'required' => 1,
                'browse' => 0,
                'read' => 1,
                'edit' => 0,
                'add' => 0,
                'delete' => 1,
                'details' => json_encode([]),
                'order' => 1,
            ]);

            // field deleted_at
            $field_deleted_at = DataRow::updateOrCreate([
                'data_type_id' => $data_type->id,
                'field' => 'deleted_at',
            ], [
                'type' => 'timestamp',
                'display_name' => trans('shop::addresses.data_rows.deleted_at'),
                'required' => 1,
                'browse' => 0,
                'read' => 1,
                'edit' => 0,
                'add' => 0,
                'delete' => 1,
                'details' => json_encode([]),
                'order' => 1,
            ]);
        });
    }
}
