<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Hamlet extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hamlets', function (Blueprint $table)
        {
        $table->increments('id');
        $table->string('location');
        $table->string('number_neighbors');
        $table->string('number_households');
        $table->string('boy');
        $table->string('girl');
        $table->string('population');
        $table->string('born_population');
        $table->string('death_population');
        $table->string('marriages');
        $table->string('divorce');
        $table->string('move_in');
        $table->string('move_out');
        $table->rememberToken();
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
        Schema::dropIfExists('hamlet');
    }
}
