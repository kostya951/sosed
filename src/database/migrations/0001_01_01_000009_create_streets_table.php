<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStreetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('streets', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('publish_user_id')->nullable(false);
            $table->unsignedBigInteger('microregion_id')->nullable(false);
            $table->string('name')->nullable();
            $table->boolean('publish')->nullable(false)->default(false);
            $table->timestamps();

            $table->foreign('publish_user_id')->references('id')->on('users');
            $table->foreign('microregion_id')->references('id')->on('microregions');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('streets');
    }
}
