<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            //FROM
            $table->unsignedInteger('from_id');
            $table->foreign('from_id')->references('id')->on('users');
            //TO
            $table->unsignedInteger('to_id');
            $table->foreign('to_id')->references('id')->on('users');

             //LAST MESSAGE: CONTENT,
            $table->text('content');

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
        Schema::dropIfExists('messages');
    }
}
