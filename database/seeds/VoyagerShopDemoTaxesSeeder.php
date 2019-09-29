<?php

namespace Tjventurini\VoyagerShop\Seeds;

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Tjventurini\VoyagerShop\Models\Tax;
use Tjventurini\VoyagerShop\Models\Country;
use Tjventurini\VoyagerShop\Models\Project;

class VoyagerShopDemoTaxesSeeder extends Seeder
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

        // create ust
        $Ust = Tax::updateOrCreate([
            'name' => 'Umsatzsteuer'
        ], [
            'tax' => 20,
            'project_id' => $Project->id,
            'country_id' => $Country->id,
        ]);
    }
}
