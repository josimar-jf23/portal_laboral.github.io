<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePublicacionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('publicaciones', function (Blueprint $table) {
            $table->increments('id');
            $table->string('adicional',250)->nullable();
            $table->date('fecha_convocatoria');
            $table->integer('vacantes');
            $table->decimal('sueldo',9,2)->nullable();
            $table->boolean('estado')->default(0);
            $table->integer('empresa_id')->unsigned();
            $table->foreign('empresa_id')->references('id')->on('empresas');
            $table->integer('puesto_id')->unsigned();
            $table->foreign('puesto_id')->references('id')->on('puestos');
            $table->integer('contacto_id')->unsigned();
            $table->foreign('contacto_id')->references('id')->on('contactos');
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
        Schema::dropIfExists('publicaciones');
    }
}
