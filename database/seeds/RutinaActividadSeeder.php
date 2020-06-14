<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;

class RutinaActividadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('rutina_actividad')->insert([
            'nombre' => 'Rutina 1',
            'activo' => true,
            'descripcion' => Str::random(30),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
    }
}
