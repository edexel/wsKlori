<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


class ChangeColumnsInfoUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('info_usuario', function (Blueprint $table) {
            $table->renameColumn('antecendenteFamiliar', 'antecedenteFamiliar');
            $table->renameColumn('antecendentePersonal', 'antecedentePersonal');
            $table->dropColumn('estatusCivil');
            $table->unsignedBigInteger('idEstadoCivil')->nullable();
            $table->foreign('idEstadoCivil')->references('idEstadoCivil')->on('estado_civil');

           
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
            //
        });
    }
}
