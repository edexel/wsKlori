<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UsuarioSesion extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuario_sesion', function (Blueprint $table) {
            $table->id();
            $table->foreignId('idUsuario')->constrained('usuario');
            $table->decimal('kcal', 6, 2);
            $table->decimal('distribucion', 6, 2);
            $table->decimal('peso', 6, 2);
            $table->decimal('talla', 6, 2);
            $table->decimal('imc', 11, 0);
            $table->decimal('grasa', 6, 2);
            $table->decimal('agua', 6, 2);
            $table->decimal('medidaCc', 6, 2);
            $table->decimal('medidaCb', 6, 2);
            $table->decimal('medidaPcb', 6, 2);
            $table->decimal('medidaPct', 6, 2);
            $table->decimal('medidaPcse', 6, 2);
            $table->decimal('medidaPcsi', 6, 2);
            $table->string('observaciones', 255);
            $table->timestamp('created_at', 0)->nullable();
            $table->timestamp('updated_at', 0)->nullable();
            $table->timestamp('deleted_at', 0)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('usuario_sesion');
    }
}
