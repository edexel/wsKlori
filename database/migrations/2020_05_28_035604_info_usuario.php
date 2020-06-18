<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class InfoUsuario extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('info_usuario', function (Blueprint $table) {
            $table->id('idInfoUsuario');
            $table->foreignId('idUsuario')->references('idUsuario')->on('usuario');
            $table->string('nombre', 100);
            $table->string('apellido', 100);
            $table->string('genero', 10);
            $table->decimal('talla', 6, 2);
            $table->smallInteger('edad');
            $table->smallInteger('ocupacion');
            $table->decimal('estatura', 6, 2);
            $table->smallInteger('estatusCivil');
            $table->string('antecendenteFamiliar', 500);
            $table->string('antecendentePersonal', 500);
            $table->string('medicamentos', 500);
            $table->string('objetivos', 500);
            $table->string('observaciones', 500);
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
        Schema::dropIfExists('info_usuario');
    }
}
