<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateVWUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement('
                CREATE VIEW vw_table_usuario AS 
                SELECT  u.id as "idUsuario",
                        u.username as "Usuario", 
                        u.email as "Correo", 
                        iu.id as "idInfoUsuario", 
                        iu.nombre as "Nombre", 
                        iu.apellido as "Apellido",
                        iu.genero as "Género",
                        iu.talla as "Talla",
                        iu.edad as "Edad", 
                        iu.ocupacion as "Ocupación",
                        iu.estatura as "Estatura", 
                        iu.estatusCivil as "Estatus Civil", 
                        iu.antecendenteFamiliar as "Antecedente familiar",
                        iu.antecendentePersonal as "Antecedente personal",
                        iu.medicamentos as "Medicamentos",
                        iu.objetivos as "Objetivos", 
                        iu.observaciones as "Observaciones"
                From klori.usuario as u INNER JOIN 
                    klori.info_usuario as iu on u.id = iu.idUsuario
                WHERE u.admin = 0 and u.activo = 1 and u.deleted_at is null and iu.deleted_at is null 
        ');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement('DROP VIEW IF EXISTS "vw_table_usuario"');
    }
}
