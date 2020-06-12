<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RacionesDiariasPlan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('raciones_diarias_plan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('idPlanSesion')->constrained('plan_sesion');
            $table->foreignId('idGrupoAlimenticio')->constrained('grupo_alimenticio');
            $table->smallInteger('caloriasTotales');
            $table->smallInteger('racionDiaria');
            $table->decimal('racionDiariaKcal', 6, 2);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('raciones_diarias_plan');
    }
}
