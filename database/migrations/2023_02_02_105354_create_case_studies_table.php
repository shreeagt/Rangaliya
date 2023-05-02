<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCaseStudiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('case_studies', function (Blueprint $table) {
            $table->id();
            $table->string('case_title',250);
            $table->string('case_url',250)->unique();
            $table->string('case_category_id',250);
            $table->string('case_tag',1000);
            $table->string('case_description',250);
            $table->string('case_keyword',250);
            $table->longText('case_body')->nullable();
            $table->string('case_thumbnail',1000);
            $table->string('case_banner_type',250);
            $table->string('case_banner',1000);
            $table->enum('case_status', ['Draft', 'Publish', 'Archive']);
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
        Schema::dropIfExists('case_studies');
    }
}
