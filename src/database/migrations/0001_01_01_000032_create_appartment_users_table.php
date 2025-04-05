<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppartmentUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('apartments_users', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('apartment_id')->nullable(false);
            $table->unsignedBigInteger('user_id')->nullable(false);
            $table->string('flat')->nullable();
            $table->string('rooms')->nullable();
            $table->string('square')->nullable();
            $table->timestamp('created_at')->nullable(false);
            $table->timestamp('updated_at')->nullable();

            $table->foreign('apartment_id')->references('id')->on('apartments');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('apartments_users');
    }
}
