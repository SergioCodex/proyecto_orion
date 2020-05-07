<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCuentasCorrientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cuentas_corrientes', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_tripulante')->unsigned();
            $table->double('saldo');
            $table->timestamps();

            $table->foreign('id_tripulante')->references('id')->on('tripulantes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cuentas_corrientes');
    }
}
