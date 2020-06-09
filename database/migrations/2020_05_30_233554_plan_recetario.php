<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PlanRecetario extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plan_recetario', function (Blueprint $table) {
            $table->id();
            $table->foreignId('idPlanSesion')->constrained('plan_sesion');
            $table->foreignId('idRecetario')->constrained('recetario');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('plan_recetario');
    }
}
