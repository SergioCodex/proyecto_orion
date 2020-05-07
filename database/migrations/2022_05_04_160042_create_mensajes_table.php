<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMensajesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mensajes', function (Blueprint $table) {
            $table->id();
            $table->date('fecha');
            $table->string('asunto', 200);
            $table->enum('relevancia', ['1', '2', '3'])->default('1');
            $table->bigInteger('id_destinatario')->unsigned();
            $table->bigInteger('id_origen')->unsigned();
            $table->text('contenido');
            $table->timestamps();

            $table->foreign('id_destinatario')->references('id')->on('tripulantes');
            $table->foreign('id_origen')->references('id')->on('tripulantes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mensajes');
    }
}
