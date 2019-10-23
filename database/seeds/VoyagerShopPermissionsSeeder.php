<?php

namespace Tjventurini\VoyagerShop\Seeds;

use TCG\Voyager\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use TCG\Voyager\Models\Permission;

class VoyagerShopPermissionsSeeder extends Seeder
{
    /**
     * Run the Seeder.
     *
     * @return void
     */
    public function run(): void
    {
        // wrap seeder in database transaction
        DB::transaction(function () {

            ////////////
            // orders //
            ////////////

            // get admin role
            $role = Role:: where('name', 'admin')->first();

            // check browse permission
            $browse = Permission::firstOrNew([
                'key' => 'browse_orders',
                'table_name' => 'orders',
            ]);
            if (!$browse->exists) {
                $browse->save();
                $role->permissions()->attach($browse);
            }

            // check read permission
            $read = Permission::firstOrNew([
                'key' => 'read_orders',
                'table_name' => 'orders',
            ]);
            if (!$read->exists) {
                $read->save();
                $role->permissions()->attach($read);
            }

            // check edit permission
            $edit = Permission::firstOrNew([
                'key' => 'edit_orders',
                'table_name' => 'orders',
            ]);
            if (!$edit->exists) {
                $edit->save();
                $role->permissions()->attach($edit);
            }

            // check add permission
            $add = Permission::firstOrNew([
                'key' => 'add_orders',
                'table_name' => 'orders',
            ]);
            if (!$add->exists) {
                $add->save();
                $role->permissions()->attach($add);
            }

            // check delete permission
            $delete = Permission::firstOrNew([
                'key' => 'delete_orders',
                'table_name' => 'orders',
            ]);
            if (!$delete->exists) {
                $delete->save();
                $role->permissions()->attach($delete);
            }

            /////////////////
            // order items //
            /////////////////

            // get admin role
            $role = Role:: where('name', 'admin')->first();

            // check browse permission
            $browse = Permission::firstOrNew([
                'key' => 'browse_order_items',
                'table_name' => 'order_items',
            ]);
            if (!$browse->exists) {
                $browse->save();
                $role->permissions()->attach($browse);
            }

            // check read permission
            $read = Permission::firstOrNew([
                'key' => 'read_order_items',
                'table_name' => 'order_items',
            ]);
            if (!$read->exists) {
                $read->save();
                $role->permissions()->attach($read);
            }

            // check edit permission
            $edit = Permission::firstOrNew([
                'key' => 'edit_order_items',
                'table_name' => 'order_items',
            ]);
            if (!$edit->exists) {
                $edit->save();
                $role->permissions()->attach($edit);
            }

            // check add permission
            $add = Permission::firstOrNew([
                'key' => 'add_order_items',
                'table_name' => 'order_items',
            ]);
            if (!$add->exists) {
                $add->save();
                $role->permissions()->attach($add);
            }

            // check delete permission
            $delete = Permission::firstOrNew([
                'key' => 'delete_order_items',
                'table_name' => 'order_items',
            ]);
            if (!$delete->exists) {
                $delete->save();
                $role->permissions()->attach($delete);
            }

            //////////////
            // products //
            //////////////

            // get admin role
            $role = Role:: where('name', 'admin')->first();

            // check browse permission
            $browse = Permission::firstOrNew([
                'key' => 'browse_products',
                'table_name' => 'products',
            ]);
            if (!$browse->exists) {
                $browse->save();
                $role->permissions()->attach($browse);
            }

            // check read permission
            $read = Permission::firstOrNew([
                'key' => 'read_products',
                'table_name' => 'products',
            ]);
            if (!$read->exists) {
                $read->save();
                $role->permissions()->attach($read);
            }

            // check edit permission
            $edit = Permission::firstOrNew([
                'key' => 'edit_products',
                'table_name' => 'products',
            ]);
            if (!$edit->exists) {
                $edit->save();
                $role->permissions()->attach($edit);
            }

            // check add permission
            $add = Permission::firstOrNew([
                'key' => 'add_products',
                'table_name' => 'products',
            ]);
            if (!$add->exists) {
                $add->save();
                $role->permissions()->attach($add);
            }

            // check delete permission
            $delete = Permission::firstOrNew([
                'key' => 'delete_products',
                'table_name' => 'products',
            ]);
            if (!$delete->exists) {
                $delete->save();
                $role->permissions()->attach($delete);
            }

            //////////////////////
            // product variants //
            //////////////////////

            // get admin role
            $role = Role:: where('name', 'admin')->first();

            // check browse permission
            $browse = Permission::firstOrNew([
                'key' => 'browse_product_variants',
                'table_name' => 'product_variants',
            ]);
            if (!$browse->exists) {
                $browse->save();
                $role->permissions()->attach($browse);
            }

            // check read permission
            $read = Permission::firstOrNew([
                'key' => 'read_product_variants',
                'table_name' => 'product_variants',
            ]);
            if (!$read->exists) {
                $read->save();
                $role->permissions()->attach($read);
            }

            // check edit permission
            $edit = Permission::firstOrNew([
                'key' => 'edit_product_variants',
                'table_name' => 'product_variants',
            ]);
            if (!$edit->exists) {
                $edit->save();
                $role->permissions()->attach($edit);
            }

            // check add permission
            $add = Permission::firstOrNew([
                'key' => 'add_product_variants',
                'table_name' => 'product_variants',
            ]);
            if (!$add->exists) {
                $add->save();
                $role->permissions()->attach($add);
            }

            // check delete permission
            $delete = Permission::firstOrNew([
                'key' => 'delete_product_variants',
                'table_name' => 'product_variants',
            ]);
            if (!$delete->exists) {
                $delete->save();
                $role->permissions()->attach($delete);
            }

            ///////////////
            // countries //
            ///////////////

            // get admin role
            $role = Role:: where('name', 'admin')->first();

            // check browse permission
            $browse = Permission::firstOrNew([
                'key' => 'browse_countries',
                'table_name' => 'countries',
            ]);
            if (!$browse->exists) {
                $browse->save();
                $role->permissions()->attach($browse);
            }

            // check read permission
            $read = Permission::firstOrNew([
                'key' => 'read_countries',
                'table_name' => 'countries',
            ]);
            if (!$read->exists) {
                $read->save();
                $role->permissions()->attach($read);
            }

            // check edit permission
            $edit = Permission::firstOrNew([
                'key' => 'edit_countries',
                'table_name' => 'countries',
            ]);
            if (!$edit->exists) {
                $edit->save();
                $role->permissions()->attach($edit);
            }

            // check add permission
            $add = Permission::firstOrNew([
                'key' => 'add_countries',
                'table_name' => 'countries',
            ]);
            if (!$add->exists) {
                $add->save();
                $role->permissions()->attach($add);
            }

            // check delete permission
            $delete = Permission::firstOrNew([
                'key' => 'delete_countries',
                'table_name' => 'countries',
            ]);
            if (!$delete->exists) {
                $delete->save();
                $role->permissions()->attach($delete);
            }

            ////////////////
            // currencies //
            ////////////////

            // get admin role
            $role = Role:: where('name', 'admin')->first();

            // check browse permission
            $browse = Permission::firstOrNew([
                'key' => 'browse_currencies',
                'table_name' => 'currencies',
            ]);
            if (!$browse->exists) {
                $browse->save();
                $role->permissions()->attach($browse);
            }

            // check read permission
            $read = Permission::firstOrNew([
                'key' => 'read_currencies',
                'table_name' => 'currencies',
            ]);
            if (!$read->exists) {
                $read->save();
                $role->permissions()->attach($read);
            }

            // check edit permission
            $edit = Permission::firstOrNew([
                'key' => 'edit_currencies',
                'table_name' => 'currencies',
            ]);
            if (!$edit->exists) {
                $edit->save();
                $role->permissions()->attach($edit);
            }

            // check add permission
            $add = Permission::firstOrNew([
                'key' => 'add_currencies',
                'table_name' => 'currencies',
            ]);
            if (!$add->exists) {
                $add->save();
                $role->permissions()->attach($add);
            }

            // check delete permission
            $delete = Permission::firstOrNew([
                'key' => 'delete_currencies',
                'table_name' => 'currencies',
            ]);
            if (!$delete->exists) {
                $delete->save();
                $role->permissions()->attach($delete);
            }

            ///////////
            // taxes //
            ///////////

            // get admin role
            $role = Role:: where('name', 'admin')->first();

            // check browse permission
            $browse = Permission::firstOrNew([
                'key' => 'browse_taxes',
                'table_name' => 'taxes',
            ]);
            if (!$browse->exists) {
                $browse->save();
                $role->permissions()->attach($browse);
            }

            // check read permission
            $read = Permission::firstOrNew([
                'key' => 'read_taxes',
                'table_name' => 'taxes',
            ]);
            if (!$read->exists) {
                $read->save();
                $role->permissions()->attach($read);
            }

            // check edit permission
            $edit = Permission::firstOrNew([
                'key' => 'edit_taxes',
                'table_name' => 'taxes',
            ]);
            if (!$edit->exists) {
                $edit->save();
                $role->permissions()->attach($edit);
            }

            // check add permission
            $add = Permission::firstOrNew([
                'key' => 'add_taxes',
                'table_name' => 'taxes',
            ]);
            if (!$add->exists) {
                $add->save();
                $role->permissions()->attach($add);
            }

            // check delete permission
            $delete = Permission::firstOrNew([
                'key' => 'delete_taxes',
                'table_name' => 'taxes',
            ]);
            if (!$delete->exists) {
                $delete->save();
                $role->permissions()->attach($delete);
            }

            ///////////
            // cards //
            ///////////

            // get admin role
            $role = Role:: where('name', 'admin')->first();

            // check browse permission
            $browse = Permission::firstOrNew([
                'key' => 'browse_cards',
                'table_name' => 'cards',
            ]);
            if (!$browse->exists) {
                $browse->save();
                $role->permissions()->attach($browse);
            }

            // check read permission
            $read = Permission::firstOrNew([
                'key' => 'read_cards',
                'table_name' => 'cards',
            ]);
            if (!$read->exists) {
                $read->save();
                $role->permissions()->attach($read);
            }

            // check edit permission
            $edit = Permission::firstOrNew([
                'key' => 'edit_cards',
                'table_name' => 'cards',
            ]);
            if (!$edit->exists) {
                $edit->save();
                $role->permissions()->attach($edit);
            }

            // check add permission
            $add = Permission::firstOrNew([
                'key' => 'add_cards',
                'table_name' => 'cards',
            ]);
            if (!$add->exists) {
                $add->save();
                $role->permissions()->attach($add);
            }

            // check delete permission
            $delete = Permission::firstOrNew([
                'key' => 'delete_cards',
                'table_name' => 'cards',
            ]);
            if (!$delete->exists) {
                $delete->save();
                $role->permissions()->attach($delete);
            }

            ///////////////
            // addresses //
            ///////////////

            // get admin role
            $role = Role:: where('name', 'admin')->first();

            // check browse permission
            $browse = Permission::firstOrNew([
                'key' => 'browse_addresses',
                'table_name' => 'addresses',
            ]);
            if (!$browse->exists) {
                $browse->save();
                $role->permissions()->attach($browse);
            }

            // check read permission
            $read = Permission::firstOrNew([
                'key' => 'read_addresses',
                'table_name' => 'addresses',
            ]);
            if (!$read->exists) {
                $read->save();
                $role->permissions()->attach($read);
            }

            // check edit permission
            $edit = Permission::firstOrNew([
                'key' => 'edit_addresses',
                'table_name' => 'addresses',
            ]);
            if (!$edit->exists) {
                $edit->save();
                $role->permissions()->attach($edit);
            }

            // check add permission
            $add = Permission::firstOrNew([
                'key' => 'add_addresses',
                'table_name' => 'addresses',
            ]);
            if (!$add->exists) {
                $add->save();
                $role->permissions()->attach($add);
            }

            // check delete permission
            $delete = Permission::firstOrNew([
                'key' => 'delete_addresses',
                'table_name' => 'addresses',
            ]);
            if (!$delete->exists) {
                $delete->save();
                $role->permissions()->attach($delete);
            }

            //////////////
            // payments //
            //////////////

            // get admin role
            $role = Role:: where('name', 'admin')->first();

            // check browse permission
            $browse = Permission::firstOrNew([
                'key' => 'browse_payments',
                'table_name' => 'payments',
            ]);
            if (!$browse->exists) {
                $browse->save();
                $role->permissions()->attach($browse);
            }

            // check read permission
            $read = Permission::firstOrNew([
                'key' => 'read_payments',
                'table_name' => 'payments',
            ]);
            if (!$read->exists) {
                $read->save();
                $role->permissions()->attach($read);
            }

            // check edit permission
            $edit = Permission::firstOrNew([
                'key' => 'edit_payments',
                'table_name' => 'payments',
            ]);
            if (!$edit->exists) {
                $edit->save();
                $role->permissions()->attach($edit);
            }

            // check add permission
            $add = Permission::firstOrNew([
                'key' => 'add_payments',
                'table_name' => 'payments',
            ]);
            if (!$add->exists) {
                $add->save();
                $role->permissions()->attach($add);
            }

            // check delete permission
            $delete = Permission::firstOrNew([
                'key' => 'delete_payments',
                'table_name' => 'payments',
            ]);
            if (!$delete->exists) {
                $delete->save();
                $role->permissions()->attach($delete);
            }
        });
    }
}
