<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsFotosToUsuarioSesion extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('usuario_sesion', function (Blueprint $table) {
            $table->string('foto1', 100)->after('medidaPcsi');
            $table->string('foto2', 100)->after('foto1');
            $table->string('foto3', 100)->after('foto2');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('usuario_sesion', function (Blueprint $table) {
            $table->dropColumn('foto1');
            $table->dropColumn('foto2');
            $table->dropColumn('foto3');
        });
    }
}
