<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = [
            [
                'category_id' => 2, 
                'name' => 'Korean Milk',
                'description' => 'Delicious Korean milkkkkk!!.',
                'price' => 15000.00,
                'image' => null,
                'has_variant' => true,
                'is_available' => true,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'category_id' => 1, 
                'name' => 'Americano',
                'description' => 'An ordinary coffee',
                'price' => 20000.00,
                'image' => null,
                'has_variant' => true,
                'is_available' => true,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ];

        DB::table('products')->insert($products);
    }
}
