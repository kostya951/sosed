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
            $table->unsignedBigInteger('apartment_id')->nullable(false);
            $table->string('titleseo')->nullable();
            $table->string('description')->nullable();
            $table->timestamps();
            $table->unsignedBigInteger('company_id')->nullable(false);
            $table->boolean('watchAll')->nullable(false)->default(false);
            $table->string('seo_title')->nullable();
            $table->string('seo_description')->nullable();
            $table->string('seo_keywords')->nullable();

            $table->foreign('apartment_id')->references('id')->on('apartments');
            $table->foreign('company_id')->references('id')->on('companies');
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
