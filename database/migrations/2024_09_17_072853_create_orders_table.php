<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('transaction_id')->nullable();
            $table->string('customer_name')->nullable();
            $table->string('email')->nullable();
            $table->enum('payment_method', ['Tunai', 'Non Tunai'])->nullable();
            $table->enum('order_status', ['Pending', 'Approved', 'In Process', 'Done', 'Cancelled'])->default('Pending');
            $table->decimal('total_amount', 10, 2)->default(0);
            $table->string('jenis_pembayaran')->nullable();

            $table->timestamps();

            $table->foreign('transaction_id')->references('id')->on('transactions')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('orders', function (Blueprint $table) {
            // Drop foreign key constraints
            $table->dropForeign(['transaction_id']);
            $table->dropForeign(['user_id']);
        });

        // Drop the table itself
        Schema::dropIfExists('orders');
    }
};

// orders_order_status_check
// order_status::text = ANY (ARRAY['Pending'::character varying, 'Approved'::character varying, 'In Process'::character varying, 'Done'::character varying, 'Cancelled'::character varying]::text[])