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
        Schema::create('variants', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('variant_type_id'); 
            $table->string('value'); // contoh: 'Strawberry', 'Large'
            $table->decimal('additional_price', 10, 2)->default(0.00); 
            $table->timestamps();

            $table->foreign('variant_type_id')->references('id')->on('variant_types')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('variants');
    }
};
