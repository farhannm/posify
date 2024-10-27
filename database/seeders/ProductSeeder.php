<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            [
                'category_id' => 1, // Coffe
                'name' => 'Espresso',
                'description' => 'A strong black coffee made by forcing steam through ground coffee beans.',
                'price' => 20.00,
                'image' => 'espresso.jpg',
                'has_variant' => false,
                'is_available' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'category_id' => 2, // Milkshake
                'name' => 'Milkshake',
                'description' => 'A rich and creamy milkshake made with fresh milk.',
                'price' => 15.00,
                'image' => 'chocolate_milkshake.jpg',
                'has_variant' => false,
                'is_available' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'category_id' => 3, // Mie
                'name' => 'Ramen',
                'description' => 'A bowl of hot and spicy ramen noodles with a delicious broth.',
                'price' => 30.00,
                'image' => 'ramen.jpg',
                'has_variant' => true,
                'is_available' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'category_id' => 4, // Nasi
                'name' => 'Nasi Goreng',
                'description' => 'Indonesian fried rice served with vegetables and fried egg.',
                'price' => 25.00,
                'image' => 'nasi_goreng.jpg',
                'has_variant' => false,
                'is_available' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'category_id' => 5, // Dessert
                'name' => 'Chocolate Lava Cake',
                'description' => 'A rich and indulgent dessert with a molten chocolate center.',
                'price' => 15.00,
                'image' => 'chocolate_lava_cake.jpg',
                'has_variant' => false,
                'is_available' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
