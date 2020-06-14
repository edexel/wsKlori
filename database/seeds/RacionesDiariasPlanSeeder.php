<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class RacionesDiariasPlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('raciones_diarias_plan')->insert([
            'idPlanSesion' => 1,
            'idGrupoAlimenticio' => 1,
            'caloriasTotales' => 300,
            'racionDiaria' => 2,
            'racionDiariaKcal' => 600.00,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
    }
}
