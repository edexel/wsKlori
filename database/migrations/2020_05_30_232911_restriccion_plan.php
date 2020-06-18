<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RestriccionPlan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('restriccion_plan', function (Blueprint $table) {
            $table->id('idRestriccionPlan');
            $table->foreignId('idPlanSesion')->references('idPlanSesion')->on('plan_sesion');
            $table->foreignId('idRestriccionAlimento')->references('idAlimento')->on('alimento');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('restriccion_plan');
    }
}
