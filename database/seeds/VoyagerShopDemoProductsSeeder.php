<?php

namespace Tjventurini\VoyagerShop\Seeds;

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Tjventurini\VoyagerShop\Models\Tax;
use Tjventurini\VoyagerShop\Models\Product;
use Tjventurini\VoyagerShop\Models\Project;
use Tjventurini\VoyagerShop\Models\ProductVariant;

class VoyagerShopDemoProductsSeeder extends Seeder
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

        // get tax
        $Tax = Tax::firstOrFail();

        // create product
        $Product = Product::updateOrCreate([
            'slug' => 'sample-product'
        ], [
            'name' => 'Sample Product',
            'description' => 'Sample Product Description',
            'includes_tax' => false,
            'tax_id' => $Tax->id,
            'project_id' => $Project->id,
        ]);

        // create first product variant
        $ProductVariantOne = ProductVariant::create([
            'name' => 'Sample Product Variant One',
            'details' => 'Sample Product Variant Details',
            'price' => '1500',
            'product_id' => $Product->id,
        ]);

        // create second product variant
        $ProductVariantTwo = ProductVariant::create([
            'name' => 'Sample Product Variant Two',
            'details' => 'Sample Product Variant Details',
            'price' => '3000',
            'product_id' => $Product->id,
        ]);
    }
}
