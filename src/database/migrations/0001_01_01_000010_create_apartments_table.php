<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApartmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('apartments', function (Blueprint $table) {
            $table->id();
            $table->integer('manager_id')->nullable();
            $table->unsignedBigInteger('country_id')->nullable(false);
            $table->unsignedBigInteger('region_id')->nullable(false);
            $table->unsignedBigInteger('city_id')->nullable(false);
            $table->unsignedBigInteger('microregion_id')->nullable(false);
            $table->unsignedBigInteger('street_id')->nullable(false);
            $table->string('dom')->nullable(false);
            $table->string('title')->nullable();
            $table->string('photo')->nullable();
            $table->text('body')->nullable();
            $table->boolean('publish')->nullable(false)->default(false);
            $table->timestamps();
            $table->string('multi')->nullable();
            $table->unsignedBigInteger('company_id')->nullable();

            $table->foreign('country_id')->references('id')->on('countries');
            $table->foreign('region_id')->references('id')->on('regions');
            $table->foreign('city_id')->references('id')->on('cities');
            $table->foreign('microregion_id')->references('id')->on('microregions');
            $table->foreign('street_id')->references('id')->on('streets');
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
        Schema::dropIfExists('apartments');
    }
}
