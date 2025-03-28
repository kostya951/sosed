<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComplexApartmntsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('complexs_apartments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('apartment_id')->nullable(false);
            $table->unsignedBigInteger('complex_id')->nullable(false);

            $table->foreign('apartment_id')->references('id')->on('apartments');
            $table->foreign('complex_id')->references('id')->on('complexs');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('complexs_apartments');
    }
}
