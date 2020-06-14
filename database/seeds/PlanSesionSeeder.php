<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;

class PlanSesionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('plan_sesion')->insert([
            'idSesion' => 1,
            'nombre' => 'Sesion 1',
            'horaDesayuno' => '08:00:00',
            'desayuno' => 'Desayuno 1',
            'horaColacionMat' => '12:00:00',
            'colacionMat' => 'Colacion 1',
            'horaComida' => '14:00:00',
            'comida' => 'Comida 1',
            'horaColacionVes' => '18:00:00',
            'colacionVes' => 'Colacion 2',
            'horaCena' => '20:00:00',
            'cena' => 'Cena 1',
            'indicaciones' => Str::random(30),
            'liquidos' => Str::random(30),
            'objetivos' => Str::random(30),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
    }
}
