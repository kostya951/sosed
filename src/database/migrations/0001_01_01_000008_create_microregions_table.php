<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMicroregionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('microregions', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->nullable(false)->unique();
            $table->string('slider')->nullable();
            $table->unsignedBigInteger('city_id')->nullable(false);
            $table->unsignedBigInteger('publish_user_id')->nullable(false);
            $table->string('name',191)->nullable(false);
            $table->string('photo')->nullable();
            $table->text('body')->nullable();
            $table->boolean('publish')->nullable(false)->default(false);
            $table->integer('front')->nullable();
            $table->timestamps();

            $table->foreign('city_id')->references('id')->on('cities');
            $table->foreign('publish_user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('microregions');
    }
}
