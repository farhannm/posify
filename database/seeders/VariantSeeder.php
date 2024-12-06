<?php

namespace Database\Seeders;

use Carbon\Carbon;
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
        $variants = [
            1 => 'Regular',
            2 => 'Medium',
            3 => 'Large',
            4 => 'Strawberry',
            5 => 'Chocolate',
            6 => 'Vanilla',
        ];

        
        foreach ($variants as $id => $value) {
            DB::table('variants')->insert([
                'id' => $id,
                'variant_type_id' => $id <= 3 ? 1 : 2, 
                'value' => $value,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}
