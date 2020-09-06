<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmpresasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empresas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre',250);
            $table->integer('tipo_doc')->nullable();//0:ruc,1:dni
            $table->string('num_doc',11)->nullable();//ruc:11digitos,dni:8digitos
            $table->string('telefono',9)->nullable();
            $table->text('localizacion')->nullable();
            $table->string('direccion')->nullable();
            $table->string('descripcion')->nullable();
            $table->integer('ciudad_id')->unsigned();
            $table->integer('rubro_id')->unsigned();
            $table->foreign('ciudad_id')->references('id')->on('ciudades');
            $table->foreign('rubro_id')->references('id')->on('rubros');             
            $table->boolean('estado')->default(1);
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
        Schema::dropIfExists('empresas');
    }
}
