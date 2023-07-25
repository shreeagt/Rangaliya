<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('product_title',250);
            $table->longText('description');
            $table->string('product_url');
            $table->string('category',250)->nullable();
            $table->unsignedBigInteger('category_id');
            $table->longText('price');
            $table->integer('quantity')->unsigned();
            $table->string('images',1000);
            $table->enum('status',['Y','N']);
            $table->string('best_seller')->nullable();
            $table->string('home')->nullable();
            $table->string('sub_services')->nullable();
            // Meta and OG columns
            $table->string('meta_title',1000);
            $table->string('meta_desc', 200);
            $table->string('meta_keywords')->nullable();
            $table->string('og_title',1000);
            $table->string('og_desc', 200);
            $table->string('og_image')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     * 
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
