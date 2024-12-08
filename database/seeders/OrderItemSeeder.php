<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrderItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('order_items')->insert([
            [
                'order_id' => 'FTW021245D',
                'product_id' => 1,
                'variant_ids' => json_encode([1, 5]), 
                'quantity' => 2,
                'price' => 50.00,
                'total' => 52.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'order_id' => 'FTW021245D',
                'product_id' => 2,
                'variant_ids' => null,
                'quantity' => 1,
                'price' => 100.00,
                'total' => 100.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}