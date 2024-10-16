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
                'user_id' => 1,
                'transaction_id' => 1,
                'customer_name' => 'John Doe',
                'total_amount' => 145.00,
                'payment_status' => 'paid',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 2,
                'transaction_id' => null,
                'customer_name' => 'Jane Smith',
                'total_amount' => 60.00,
                'payment_status' => 'pending',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 3,
                'transaction_id' => 2,
                'customer_name' => 'Michael Johnson',
                'total_amount' => 120.00,
                'payment_status' => 'paid',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 4,
                'transaction_id' => 3,
                'customer_name' => 'Emily Davis',
                'total_amount' => 110.00,
                'payment_status' => 'paid',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}