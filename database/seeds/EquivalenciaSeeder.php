<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;

class EquivalenciaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('equivalencia')->insert([
            'idGrupoAlimenticio' => 1,
            'nombre' => 'Equivalencia 1',
            'porcion' => 'Porcion 1',
            'kcal' => 100.02,
            'descripcion' => Str::random(30),
            'activo' => true,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
    }
}
