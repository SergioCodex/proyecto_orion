<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIncidenciasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('incidencias', function (Blueprint $table) {
            $table->id();
            $table->enum('status', ['En progreso', 'Resuelto', 'Abierto'])->default('En progreso');
            $table->bigInteger('id_comunicador')->unsigned();
            $table->bigInteger('id_sector_origen')->unsigned();
            $table->string('titulo');
            $table->string('descripcion');
            $table->bigInteger('id_agente')->unsigned()->nullable();
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
        Schema::dropIfExists('incidencias');
    }
}
