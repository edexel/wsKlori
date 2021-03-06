<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PlanSesion extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plan_sesion', function (Blueprint $table) {
            $table->id();
            $table->foreignId('idSesion')->constrained('usuario_sesion');
            $table->string('nombre', 50);
            $table->time('horaDesayuno', 0);
            $table->string('desayuno', 1000);
            $table->time('horaColacionMat', 0);
            $table->string('colacionMat', 500);
            $table->time('horaComida', 0);
            $table->string('comida', 1000);
            $table->time('horaColacionVes', 0);
            $table->string('colacionVes', 500);
            $table->time('horaCena', 0);
            $table->string('cena', 1000);
            $table->string('indicaciones', 1000);
            $table->string('liquidos', 500);
            $table->string('objetivos', 200);
            $table->timestamp('created_at', 0);
            $table->timestamp('updated_at', 0);
            $table->timestamp('deleted_at', 0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('plan_sesion');
    }
}
