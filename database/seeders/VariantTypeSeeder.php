<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VariantTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('variant_types')->insert([
            ['name' => 'Rasa', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Ukuran', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Warna', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}