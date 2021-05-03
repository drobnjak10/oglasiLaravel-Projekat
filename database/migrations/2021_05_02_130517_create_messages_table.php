<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('messages', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('text');
            $table->unsignedBigInteger('sender_id'); // user id koji salje poruke
            $table->unsignedBigInteger('receiver_id'); // user id koji prima poruku
            $table->unsignedBigInteger('ad_id'); // oglas zbog kog se salje poruka
            $table->timestamps();

            $table->foreign('ad_id')->references('id')->on('ads')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('messages');
    }
}
