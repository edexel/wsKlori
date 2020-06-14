<?php

use Illuminate\Database\Seeder;

class RutinaSesionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('rutina_sesion')->insert([
            'idPlanSesion' => 1,
            'idRutinaActividad' => 1,
        ]);
    }
}
