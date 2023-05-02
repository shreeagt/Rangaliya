<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->nullable();
            $table->string('billing_email',250)->nullable();
            $table->string('billing_name',250)->nullable();
            $table->string('billing_address',250)->nullable();
            $table->string('billing_city',250)->nullable();
            $table->string('billing_province',250)->nullable();
            $table->string('billing_postalcode')->nullable();
            $table->string('billing_phone',1000)->nullable();
            $table->integer('billing_discount');
            $table->string('billing_discount_code',250)->nullable();
            $table->integer('billing_subtotal');
            $table->integer('billing_tax');
            $table->integer('billing_total');
            $table->string('payment_gateway',250);
            $table->string('error',250)->nullable();
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
        Schema::dropIfExists('orders');
    }
}
