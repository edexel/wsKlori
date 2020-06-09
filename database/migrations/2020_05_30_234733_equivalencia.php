<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Equivalencia extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('equivalencia', function (Blueprint $table) {
            $table->id();
            $table->foreignId('idGrupoAlimenticio')->constrained('grupo_alimenticio');
            $table->string('nombre', 50);
            $table->string('porcion', 50);
            $table->decimal('kcal', 8, 2);
            $table->string('descripcion', 100);
            $table->boolean('activo');
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
        Schema::dropIfExists('equivalencia');
    }
}
