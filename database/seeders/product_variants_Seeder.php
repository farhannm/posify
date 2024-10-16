<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductVariantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('product_variants')->insert([
            // Assign variants to the product with ID 1 (Espresso)
            ['product_id' => 1, 'variant_id' => 1], // Strawberry
            ['product_id' => 1, 'variant_id' => 2], // Vanilla

            // Assign variants to the product with ID 2 (Chocolate Milkshake)
            ['product_id' => 2, 'variant_id' => 1], // Strawberry
            ['product_id' => 2, 'variant_id' => 2], // Vanilla

            // Assign variants to the product with ID 3 (Spicy Ramen)
            ['product_id' => 3, 'variant_id' => 3], // Small
            ['product_id' => 3, 'variant_id' => 4], // Large

            // Assign variants to the product with ID 4 (Nasi Goreng)
            ['product_id' => 4, 'variant_id' => 3], // Small
            ['product_id' => 4, 'variant_id' => 4], // Large

            // Assign variants to the product with ID 5 (Chocolate Lava Cake)
            ['product_id' => 5, 'variant_id' => 5], // Red
            ['product_id' => 5, 'variant_id' => 6], // Blue
        ]);
    }
}
