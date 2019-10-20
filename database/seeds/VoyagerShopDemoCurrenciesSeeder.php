<?php

namespace Tjventurini\VoyagerShop\Seeds;

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Tjventurini\VoyagerShop\Models\Country;
use Tjventurini\VoyagerShop\Models\Project;
use Tjventurini\VoyagerShop\Models\Currency;

class VoyagerShopDemoCurrenciesSeeder extends Seeder
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

        // create euro
        $Euro = Currency::updateOrCreate([
            'code' => 'EUR'
        ], [
            'name' => 'Euro',
            'sign' => '€',
            'project_id' => $Project->id,
            'country_id' => $Country->id,
        ]);

        // create usd
        $Usd = Currency::updateOrCreate([
            'code' => 'USD'
        ], [
            'name' => 'US Dollar',
            'sign' => '$',
            'project_id' => $Project->id,
            'country_id' => $Country->id,
        ]);
    }
}
