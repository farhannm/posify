<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductVariantStockSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('product_variant_stocks')->insert([
            ['product_id' => 1, 'variant_ids' => json_encode([3]), 'stock' => 10, 'isAvailable' => true, 'created_at' => now(), 'updated_at' => now()], // Small
            ['product_id' => 1, 'variant_ids' => json_encode([4]), 'stock' => 5, 'isAvailable' => true, 'created_at' => now(), 'updated_at' => now()], // Large

            ['product_id' => 2, 'variant_ids' => json_encode([1, 3]), 'stock' => 7, 'isAvailable' => true, 'created_at' => now(), 'updated_at' => now()], // Strawberry,small
            ['product_id' => 2, 'variant_ids' => json_encode([1, 4]), 'stock' => 10, 'isAvailable' => true, 'created_at' => now(), 'updated_at' => now()], // Strawberry, small
            ['product_id' => 2, 'variant_ids' => json_encode([2, 3]), 'stock' => 7, 'isAvailable' => true, 'created_at' => now(), 'updated_at' => now()], // Strawberry, large
            ['product_id' => 2, 'variant_ids' => json_encode([2, 4]), 'stock' => 10, 'isAvailable' => true, 'created_at' => now(), 'updated_at' => now()], // Vanilla, large

            ['product_id' => 3, 'variant_ids' => json_encode([3]), 'stock' => 10, 'isAvailable' => true, 'created_at' => now(), 'updated_at' => now()], // Small
            ['product_id' => 3, 'variant_ids' => json_encode([4]), 'stock' => 5, 'isAvailable' => true, 'created_at' => now(), 'updated_at' => now()], // Large

            ['product_id' => 4, 'variant_ids' => json_encode([3]), 'stock' => 10, 'isAvailable' => true, 'created_at' => now(), 'updated_at' => now()], // Small
            ['product_id' => 4, 'variant_ids' => json_encode([4]), 'stock' => 5, 'isAvailable' => true, 'created_at' => now(), 'updated_at' => now()], // Large

            ['product_id' => 5, 'variant_ids' => json_encode([5]), 'stock' => 10, 'isAvailable' => true, 'created_at' => now(), 'updated_at' => now()], // Red
            ['product_id' => 5, 'variant_ids' => json_encode([6]), 'stock' => 5, 'isAvailable' => true, 'created_at' => now(), 'updated_at' => now()], // Blue
        ]);
    }
}
