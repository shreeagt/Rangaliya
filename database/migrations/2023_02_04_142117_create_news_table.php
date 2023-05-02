<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news', function (Blueprint $table) {
           
            $table->id();
            $table->string('news_title',250);
            $table->string('news_url',250)->unique();
            $table->string('news_category_id',250);
            $table->string('news_tag',1000);
            $table->string('news_description',250);
            $table->string('news_keyword',250);
            $table->longText('news_body')->nullable();
            $table->string('news_thumbnail',1000);
            $table->string('news_banner_type',250);
            $table->string('news_banner',1000);
            $table->enum('news_status', ['Draft', 'Publish', 'Archive']);
            $table->timestamp('published_date')->nullable();
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
        Schema::dropIfExists('news');
    }
}
