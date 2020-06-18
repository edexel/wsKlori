<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RutinaSesion extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rutina_sesion', function (Blueprint $table) {
            $table->id('idRutinaSesion');
            $table->foreignId('idPlanSesion')->references('idPlanSesion')->on('plan_sesion');
            $table->foreignId('idRutinaActividad')->references('idRutinaActividad')->on('rutina_actividad');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rutina_sesion');
    }
}
