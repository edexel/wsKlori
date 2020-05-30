<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Recetario extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recetario', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 100);
            $table->string('descripcion', 500);
            $table->string('ingredientes', 500);
            $table->string('preparacion', 500);
            $table->string('nota', 250);
            $table->string('tipoComida', 100);
            $table->decimal('totalKcal', 6, 2);
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
        Schema::dropIfExists('recetario');
    }
}
