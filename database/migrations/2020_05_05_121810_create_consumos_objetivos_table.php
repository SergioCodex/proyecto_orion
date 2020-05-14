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
            $table->bigInteger('id_objetivo')->unsigned();
            $table->double('oxigeno')->nullable();
            $table->double('agua')->nullable();
            $table->double('alimento')->nullable();
            $table->double('combustible')->nullable();
            $table->double('energia')->nullable();
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
