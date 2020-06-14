<?php

use Illuminate\Database\Seeder;

class RestriccionPlanSeeder extends Seeder
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
            'idRestriccionAlimento' => 1,
        ]);
    }
}
