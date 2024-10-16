<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('orders')->insert([
            [
                'id' => 30,
                'user_id' => 2,
                'transaction_id' => null,
                'customer_name' => 'John Doe',
                'total_amount' => 145.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 31,
                'user_id' => 2,
                'transaction_id' => null,
                'customer_name' => 'Jane Smith',
                'total_amount' => 60.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 32,
                'user_id' => 2,
                'transaction_id' => null,
                'customer_name' => 'Michael Johnson',
                'total_amount' => 120.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 33,
                'user_id' => 2,
                'transaction_id' => null,
                'customer_name' => 'Emily Davis',
                'total_amount' => 110.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
