<?php

namespace Tjventurini\VoyagerShop\Seeds;

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Tjventurini\VoyagerShop\Models\Tag;

class VoyagerShopDemoTagsSeeder extends Seeder
{
    /**
     * Run the voyager tags package database seeders.
     *
     * @return void
     */
    public function run()
    {
        // create tag 1
        Tag::updateOrCreate([
            'slug' => 'hello'
        ], [
            'name' => 'Hello',
            'project_id' => 1,
        ]);

        // create tag 2
        Tag::updateOrCreate([
            'slug' => 'world'
        ], [
            'name' => 'World',
            'project_id' => 1,
        ]);
    }
}
