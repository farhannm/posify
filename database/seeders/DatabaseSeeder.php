<?php

namespace Database\Seeders;

use App\Models\Categories;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UserSeeder::class,
            VariantTypeSeeder::class,
            VariantSeeder::class,
            CategorySeeder::class,
            ProductSeeder::class,
            ProductVariantStockSeeder::class,
            OrderSeeder::class,
            orderItemSeeder::class,
        ]);
    }
}
