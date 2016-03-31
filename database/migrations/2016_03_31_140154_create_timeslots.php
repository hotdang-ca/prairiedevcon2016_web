<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTimeslots extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rooms', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
        });

        Schema::create('timeslots', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('day'); // 0 is Monday or the first day, 1 is tuesday or the second day
            $table->string('timerange'); // just a textual representation of the timerange

            $table->integer('room_id')->unsigned();
            $table->integer('speaker_id')->unsigned();
            $table->integer('session_id')->unsigned();

            $table->foreign('room_id')->references('id')->on('rooms');
            $table->foreign('speaker_id')->references('id')->on('speakers');
            $table->foreign('session_id')->references('id')->on('sessions');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('timeslots');
        Schema::drop('rooms');
    }
}
