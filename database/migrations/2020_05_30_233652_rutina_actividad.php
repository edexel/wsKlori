<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RutinaActividad extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rutina_actividad', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 100);
            $table->boolean('activo');
            $table->string('descripcion', 500);
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
        Schema::dropIfExists('rutina_actividad');
    }
}
