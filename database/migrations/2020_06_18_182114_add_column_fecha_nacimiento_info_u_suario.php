<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnFechaNacimientoInfoUSuario extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('info_usuario', function (Blueprint $table) {
            $table->dropColumn('edad');
            $table->date('fecha_nacimiento')->nullable()->after('apellido');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('info_usuario', function (Blueprint $table) {
            $table->dropColumn('fecha_nacimiento');
            $table->number('edad')->nullable();
        });
    }
}
