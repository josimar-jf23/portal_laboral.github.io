<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetallesPublicacionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalles_publicacion', function (Blueprint $table) {
            $table->increments('id');
            $table->text('caracteristica');
            $table->integer('orden')->default(1);
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
        Schema::dropIfExists('detalles_publicacion');
    }
}
