<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEspecialidadUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('especialidad_user', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('especialidad_id');
            $table->unsignedBigInteger('user_id');
            $table->timestamps();

            $table->foreign('especialidad_id')->references('id')->on('especialidads');
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
        Schema::dropIfExists('especialidad_user');
    }
}
