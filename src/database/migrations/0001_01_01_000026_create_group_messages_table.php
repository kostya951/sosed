<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGroupMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('groups_messages', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('group_id');
            $table->unsignedBigInteger('user_id');
            $table->longText('body')->nullable();
            $table->string('attachment')->nullable();
            $table->boolean('seen')->default(0);

            $table->timestamps();

            $table->foreign('group_id')->references('id')->on('groups');
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
        Schema::dropIfExists('groups_messages');
    }
}
