<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('apartment_id')->nullable(false);
            $table->unsignedBigInteger('company_id')->nullable();
            $table->string('title');
            $table->text('description');
            $table->string('images')->nullable();

            $table->string('status')->default('бесплатное');

            $table->string('pay_status')->nullable();
            $table->string('pay_id')->nullable();
            $table->string('pay_price')->nullable();

            $table->string('price')->nullable();
            $table->string('top')->nullable();

            $table->integer('rating')->default(0);
            $table->timestamp('top_time')->nullable();

            $table->string('color')->nullable();
            $table->timestamp('color_time')->nullable();


            $table->string('additionalimages')->nullable();
            $table->timestamp('additionalimages_time')->nullable();

            $table->integer('views')->default(0);

            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
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
        Schema::dropIfExists('services');
    }
}
