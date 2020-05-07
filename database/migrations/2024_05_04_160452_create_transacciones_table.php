<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransaccionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transacciones', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_cuenta_origen')->unsigned();
            $table->bigInteger('id_cuenta_destino')->unsigned();
            $table->double('cantidad');
            $table->bigInteger('id_tipo_transaccion')->unsigned();
            $table->timestamps();

            $table->foreign('id_cuenta_origen')->references('id')->on('cuentas_corrientes');
            $table->foreign('id_cuenta_destino')->references('id')->on('cuentas_corrientes');
            $table->foreign('id_tipo_transaccion')->references('id')->on('tipos_transacciones');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transacciones');
    }
}
