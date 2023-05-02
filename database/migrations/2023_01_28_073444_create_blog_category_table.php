<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlogCategoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blog_category', function (Blueprint $table) {
            $table->id();
            $table->string('category_title',250);
            $table->string('category_description',250);
            $table->longText('category_body')->nullable();
            $table->string('category_thumbnail',1000);
            $table->string('category_banner',1000);
            $table->enum('category_status', ['Y', 'N']);
            //Meta Details and OG Details
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
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('blog_category');
    }
}
