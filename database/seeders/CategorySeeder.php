<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            ['category_name' => 'Coffee', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['category_name' => 'Non Coffee', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['category_name' => 'Meals', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['category_name' => 'Side Dish', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        ];

        DB::table('categories')->insert($categories);
    }
}
