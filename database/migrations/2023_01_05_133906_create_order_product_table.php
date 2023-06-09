<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('order_product');
        Schema::create('order_product', function (Blueprint $table) {
            $table->id();
            $table->integer('order_id');
            $table->integer('product_id')->nullable();
            $table->integer('quantity')->nullable(); 
            $table->enum('order_status',['dispatch','shipped','delivered','order_placed']);   
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_product');
    }
}
