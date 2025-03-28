<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChatmessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chat_messages', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('chatroom_id')->nullable(false);
            $table->unsignedBigInteger('user_id')->nullable(false);
            $table->longText('body')->nullable();
            $table->string('attachment')->nullable();
            $table->boolean('seen')->nullable(false)->default(false);

            $table->timestamps();
            $table->foreign('chatroom_id')->references('id')->on('chatrooms');
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
        Schema::dropIfExists('chat_messages');
    }
}
