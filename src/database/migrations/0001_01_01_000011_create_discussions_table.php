<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDiscussionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('discussions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable(false);
            $table->foreign('user_id')->references('id')->on('users')->cascadeOnDelete();
            $table->unsignedBigInteger('apartment_id')->nullable(false);
            $table->foreign('apartment_id')->references('id')->on('apartments');
            $table->string('title')->nullable(false);
            $table->string('photo')->nullable();
            $table->text('body')->nullable(false);
            $table->text('answer')->nullable();
            $table->string('slug')->unique()->nullable();
            $table->integer('status')->nullable();
            $table->unsignedBigInteger('see')->nullable(false)->default(0);
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
        Schema::dropIfExists('discussions');
    }
}
