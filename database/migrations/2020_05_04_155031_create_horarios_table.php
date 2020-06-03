<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHorariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('horarios', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_sector')->unsigned();
            $table->string('dia');
            $table->string('hora_inicio');
            $table->string('hora_fin');
            $table->string('tarea');
            $table->timestamps();

            $table->foreign('id_sector')->references('id')->on('sectors');
        });

        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('horarios');
    }
}
