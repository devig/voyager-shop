<?php

namespace Tjventurini\VoyagerShop\Seeds;

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Tjventurini\VoyagerShop\Models\Address;
use Tjventurini\VoyagerShop\Models\Country;
use Tjventurini\VoyagerShop\Models\Project;

class VoyagerShopDemoAddressesSeeder extends Seeder
{
    /**
     * Run the voyager tags package database seeders.
     *
     * @return void
     */
    public function run()
    {
        // get hello world project
        $Project = Project::where('slug', 'hello-world')->firstOrFail();

        // get country
        $Country = Country::firstOrFail();

        // get user
        $User = User::firstOrFail();

        // create address
        $Address = Address::create([
            'name' => 'John Doe',
            'street' => 'Himmelweg 13 Tür 5',
            'zip' => '6972',
            'project_id' => $Project->id,
            'country_id' => $Country->id,
            'user_id' => $User->id,
        ]);
    }
}
