<?php

namespace Tjventurini\VoyagerShop\Seeds;

use App\User;
use Illuminate\Database\Seeder;
use TCG\Voyager\Models\MenuItem;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Tjventurini\VoyagerShop\Models\Country;
use Tjventurini\VoyagerShop\Models\Project;

class VoyagerShopDemoCountriesSeeder extends Seeder
{
    /**
     * Run the voyager tags package database seeders.
     *
     * @return void
     */
    public function run()
    {
        // get hello world-project
        $Project = Project::where(['slug' => 'hello-world'])->firstOrFail();

        // create country
        $Austria = Country::updateOrCreate([
            'code' => 'AT'
        ], [
            'name' => 'Austria',
            'project_id' => $Project->id,
        ]);
    }
}
