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

            // field project_id
            $field_project_id = DataRow::updateOrCreate([
                'data_type_id' => $data_type->id,
                'field' => 'project_id',
            ], [
                'type' => 'hidden',
                'display_name' => 'Hidden project id',
                'required' => 1,
                'browse' => 1,
                'read' => 1,
                'edit' => 1,
                'add' => 1,
                'delete' => 1,
                'details' => [],
                'order' => 1,
            ]);

            // field project
            $field_name = DataRow::updateOrCreate([
                'data_type_id' => $data_type->id,
                'field' => 'page_belongsto_project_relationship',
            ], [
                'type' => 'relationship',
                'display_name' => 'Project',
                'required' => 1,
                'browse' => 1,
                'read' => 1,
                'edit' => 1,
                'add' => 1,
                'delete' => 1,
                'details' => [
                    'model' => "Tjventurini\\VoyagerProjects\\Models\\Project",
                    'table' => 'projects',
                    'type' => 'belongsTo',
                    'column' => 'project_id',
                    'key' => 'id',
                    'label' => 'name',
                    'pivot' => 0,
                    'taggable' => 0,
                ],
                'order' => 1,
            ]);

            // field user_id
            $field_user_id = DataRow::updateOrCreate([
                'data_type_id' => $data_type->id,
                'field' => 'user_id',
            ], [
                'type' => 'hidden',
                'display_name' => 'Hidden user id',
                'required' => 1,
                'browse' => 1,
                'read' => 1,
                'edit' => 1,
                'add' => 1,
                'delete' => 1,
                'details' => [],
                'order' => 1,
            ]);

            // field user
            $field_name = DataRow::updateOrCreate([
                'data_type_id' => $data_type->id,
                'field' => 'page_belongsto_user_relationship',
            ], [
                'type' => 'relationship',
                'display_name' => 'User',
                'required' => 1,
                'browse' => 1,
                'read' => 1,
                'edit' => 1,
                'add' => 1,
                'delete' => 1,
                'details' => [
                    'model' => \App\User::class,
                    'table' => 'users',
                    'type' => 'belongsTo',
                    'column' => 'user_id',
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
}
