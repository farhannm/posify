<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProductVariantStockSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sizes = [1, 2, 3];  
        $flavors = [4, 5, 6];  

        $productVariantStocks = [];

        // Membuat kombinasi semua size dan flavor
        foreach ($sizes as $size) {
            foreach ($flavors as $flavor) {
                $productVariantStocks[] = [
                    'product_id' => 1, 
                    'variant_ids' => json_encode([$size, $flavor]), 
                    'additional_price' => $this->calculateAdditionalPrice($size),
                    'stock' => 20, 
                    'isAvailable' => true,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ];
            }
        }

        // Insert data ke database
        DB::table('product_variant_stocks')->insert($productVariantStocks);
    }

    private function calculateAdditionalPrice($sizeId)
    {
        switch ($sizeId) {
            case 1: // Regular
                return 0.00;
            case 2: // Medium
                return 4000.00;
            case 3: // Large
                return 7000.00;
            default:
                return 0.00;
        }
    }
}
