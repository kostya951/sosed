<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ads', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('category_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('category_id')->references('id')->on('ads_categories');
            $table->string('title')->nullable(false);
            $table->string('photo')->nullable();
            $table->integer('price')->nullable(false);
            $table->integer('mouns')->nullable();
            $table->text('body')->nullable();
            $table->string('slug')->nullable()->unique();
            $table->integer('status')->nullable();
            $table->unsignedBigInteger('apartment_id')->nullable(false);
            $table->foreign('apartment_id')->references('id')->on('apartments');

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
        Schema::dropIfExists('ads');
    }
}
