<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DispositivoUsuario extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dispositivo_usuario', function (Blueprint $table) {
            $table->id('idDispositivoUsuario');
            $table->foreignId('idUsuario')->references('idUsuario')->on('usuario');
            $table->string('modelo', 50);
            $table->string('plataforma', 15);
            $table->string('uuid', 100);
            $table->string('codigo', 15);
            $table->dateTime('fechaAlta', 0);
            $table->dateTime('created_at', 0)->nullable();
            $table->dateTime('updated_at', 0)->nullable();
            $table->dateTime('deleted_at', 0)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dispositivo_usuario');
    }
}
