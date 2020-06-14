<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Carbon\Carbon;

class UsuarioSesionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('usuario_sesion')->insert([
            'idUsuario' => 2,
            'kcal' => 302.01,
            'distribucion' => 6.2,
            'peso' => 70,
            'talla' => 5.2,
            'imc' => 100.01,
            'grasa' => 40.02,
            'agua' => 2,
            'medidaCc' => 6.2,
            'medidaCb' => 6.2,
            'medidaPcb' => 6.2,
            'medidaPct' => 6.2,
            'medidaPcse' => 6.2,
            'medidaPcsi' => 6.2,
            'observaciones' => Str::random(30),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
    }
}
