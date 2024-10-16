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
                'order_id' => 1,
                'product_id' => 1, // Espresso
                'quantity' => 2,
                'price' => 50.00,
                'total' => 100.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'order_id' => 1,
                'product_id' => 2, // Chocolate Milkshake
                'quantity' => 1,
                'price' => 45.00,
                'total' => 45.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'order_id' => 2,
                'product_id' => 3, // Spicy Ramen
                'quantity' => 1,
                'price' => 60.00,
                'total' => 60.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'order_id' => 3,
                'product_id' => 4, // Nasi Goreng
                'quantity' => 3,
                'price' => 40.00,
                'total' => 120.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'order_id' => 4,
                'product_id' => 5, // Chocolate Lava Cake
                'quantity' => 2,
                'price' => 55.00,
                'total' => 110.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}