<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTurnoUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('turno_user', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('turno_id');
            $table->unsignedBigInteger('user_id');
            $table->timestamps();

            $table->foreign('turno_id')->references('id')->on('turnos');
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
        Schema::dropIfExists('turno_user');
    }
}
