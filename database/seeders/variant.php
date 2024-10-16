<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VariantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('variants')->insert([
            ['variant_type_id' => 1, 'value' => 'Strawberry', 'created_at' => now(), 'updated_at' => now()],
            ['variant_type_id' => 1, 'value' => 'Vanilla', 'created_at' => now(), 'updated_at' => now()],
            ['variant_type_id' => 2, 'value' => 'Small', 'created_at' => now(), 'updated_at' => now()],
            ['variant_type_id' => 2, 'value' => 'Large', 'created_at' => now(), 'updated_at' => now()],
            ['variant_type_id' => 3, 'value' => 'Red', 'created_at' => now(), 'updated_at' => now()],
            ['variant_type_id' => 3, 'value' => 'Blue', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
