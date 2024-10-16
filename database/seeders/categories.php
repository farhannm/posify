<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            ['category_name' => 'Coffe', 'created_at' => now(), 'updated_at' => now()],
            ['category_name' => 'Milkshake', 'created_at' => now(), 'updated_at' => now()],
            ['category_name' => 'Mie', 'created_at' => now(), 'updated_at' => now()],
            ['category_name' => 'Nasi', 'created_at' => now(), 'updated_at' => now()],
            ['category_name' => 'Dessert', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
