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
                'order_id' => 30,
                'product_id' => 1, // Espresso
                'quantity' => 2,
                'price' => 20.00,
                'total' => 40.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'order_id' => 30,
                'product_id' => 2, // Chocolate Milkshake
                'quantity' => 1,
                'price' => 15.00,
                'total' => 15.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'order_id' => 31,
                'product_id' => 3, // Spicy Ramen
                'quantity' => 1,
                'price' => 15.00,
                'total' => 30.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'order_id' => 31,
                'product_id' => 4, // Nasi Goreng
                'quantity' => 3,
                'price' => 25.00,
                'total' => 75.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'order_id' => 32,
                'product_id' => 5, // Chocolate Lava Cake
                'quantity' => 2,
                'price' => 15.00,
                'total' => 30.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}