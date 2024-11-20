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
        // for ($i = 1; $i <= 10; $i++) {
        //     DB::table('orders')->insert([
        //         'user_id' => 2, 
        //         'transaction_id' => null, 
        //         'customer_name' => 'Customer ' . $i,
        //         'email' => 'customer' . $i . '@example.com',
        //         'order_status' => 'Pending',
        //         'total_amount' => mt_rand(1000, 10000) / 100,
        //         'created_at' => now(),
        //         'updated_at' => now(),
        //     ]);
        // }

        DB::table('orders')->insert([
            [
                'user_id' => 2,
                'transaction_id' => null,
                'customer_name' => 'John Doe',
                'email' => 'johndoe@example.com',
                'order_status' => 'Pending',
                'total_amount' => 100.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 2,
                'transaction_id' => null,
                'customer_name' => 'Jane Smith',
                'email' => 'janesmith@example.com',
                'order_status' => 'Pending',
                'total_amount' => 200.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
