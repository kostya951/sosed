<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdsCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ads_categories', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->nullable(false)->unique();
            $table->bigInteger('parent_id')->nullable();
            $table->string('title')->nullable();
            $table->string('h1')->nullable();
            $table->string('page_title')->nullable();
            $table->text('body')->nullable();
            $table->string('meta_description',1000)->nullable();
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
        Schema::dropIfExists('ads_categories');
    }
}
