<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuscriptoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('suscriptores', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombres',250);
            $table->string('apellidos',250);
            $table->string('dni',8);
            $table->string('email',250)->nullable();
            $table->string('celular',250);
            $table->integer('publicacion_id')->unsigned();
            $table->foreign('publicacion_id')->references('id')->on('publicaciones');
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
        Schema::dropIfExists('suscriptores');
    }
}
