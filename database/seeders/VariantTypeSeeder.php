<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class VariantTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $variant_types = [
            ['name' => 'Size', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Flavor', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            
        ];

        DB::table('variant_types')->insert($variant_types);
    }
}
