<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateManagmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('managements', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->nullable();
            $table->text('title')->nullable();
            $table->text('body')->nullable();
            $table->string('photo')->nullable();
            $table->text('answer')->nullable();
            $table->integer('status')->nullable();
            $table->timestamps();
            $table->integer('company_id')->nullable();
            $table->integer('apartment_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('managements');
    }
}
