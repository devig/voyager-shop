<?php

namespace Tjventurini\VoyagerShop\Seeds;

use App\User;
use TCG\Voyager\Models\Menu;
use TCG\Voyager\Models\Role;
use Illuminate\Database\Seeder;
use TCG\Voyager\Models\MenuItem;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Tjventurini\VoyagerShop\Seeds\VoyagerShopDemoTagsSeeder;
use Tjventurini\VoyagerShop\Seeds\VoyagerShopDemoTaxesSeeder;
use Tjventurini\VoyagerShop\Seeds\VoyagerShopDemoProductsSeeder;
use Tjventurini\VoyagerShop\Seeds\VoyagerShopDemoCountriesSeeder;
use Tjventurini\VoyagerShop\Seeds\VoyagerShopDemoCurrenciesSeeder;

class VoyagerShopDemoContentSeeder extends Seeder
{
    /**
     * Run the voyager tags package database seeders.
     *
     * @return void
     */
    public function run()
    {
        // create admin user
        $AdminRole = Role::where(['name' => 'admin'])->firstOrFail();
        $User = User::updateOrCreate([
            'email' => 'admin@admin.com'
        ], [
            'name' => 'Admin',
            'password' => Hash::make('password'),
            'role_id' => $AdminRole->id,
        ]);

        $this->call(VoyagerShopDemoCountriesSeeder::class);
        $this->call(VoyagerShopDemoCurrenciesSeeder::class);
        $this->call(VoyagerShopDemoTaxesSeeder::class);
        $this->call(VoyagerShopDemoProductsSeeder::class);
        $this->call(VoyagerShopDemoAddressesSeeder::class);
        $this->call(VoyagerShopDemoTagsSeeder::class);
    }
}
