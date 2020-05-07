<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRequisitosObjetivosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('requisitos_objetivos', function (Blueprint $table) {
            $table->id();
            //$table->bigInteger('id_objetivo')->unsigned();
            $table->double('%_oxigeno')->nullable();
            $table->double('%_agua')->nullable();
            $table->double('%_alimento')->nullable();
            $table->double('%_combustible')->nullable();
            $table->double('%_energia')->nullable();
            $table->timestamps();

            //$table->foreign('id_objetivo')->references('id')->on('objetivos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('requisitos_objetivos');
    }
}
