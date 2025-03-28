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
            $table->string('title')->nullable();
            $table->text('body')->nullable();
            $table->string('photo')->nullable();
            $table->string('slug')->nullable()->unique();
            $table->integer('apartment_id')->nullable();
            $table->string('titleseo')->nullable();
            $table->string('description')->nullable();
            $table->timestamps();
            $table->integer('company_id')->nullable();
            $table->boolean('watchAll')->nullable(false)->default(false);
            $table->string('seo_title')->nullable();
            $table->string('seo_description')->nullable();
            $table->string('seo_keywords')->nullable();
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
