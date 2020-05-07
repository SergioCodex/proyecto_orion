<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateObjetivosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('objetivos', function (Blueprint $table) {
            $table->id();
            $table->string('titulo');
            $table->string('descripcion');
            $table->bigInteger('id_sector')->unsigned();
            $table->bigInteger('id_requisitos')->unsigned();
            $table->timestamps();

            $table->foreign('id_sector')->references('id')->on('sectores');
            $table->foreign('id_requisitos')->references('id')->on('requisitos_objetivos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('objetivos');
    }
}
