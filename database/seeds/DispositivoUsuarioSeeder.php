<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;

class DispositivoUsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('dispositivo_usuario')->insert([
            'idUsuario' => 2,
            'modelo' => 'Modelo 1',
            'plataforma' => 'Android',
            'uuid' => Str::random(30),
            'codigo' => Str::random(15),
            'fechaAlta' => Carbon::now()->format('Y-m-d H:i:s'),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
    }
}
