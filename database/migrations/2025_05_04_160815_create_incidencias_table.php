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
            $table->bigInteger('id_comunicador')->unsigned();
            $table->bigInteger('id_sector_origen')->unsigned();
            $table->string('descripcion');
            $table->timestamps();

            $table->foreign('id_comunicador')->references('id')->on('tripulantes');
            $table->foreign('id_sector_origen')->references('id')->on('sectores');
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
