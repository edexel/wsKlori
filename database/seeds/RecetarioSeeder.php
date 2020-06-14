<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;

class RecetarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('recetario')->insert([
            'nombre' => 'Recetario 1',
            'descripcion' => Str::random(30),
            'ingredientes' => Str::random(30),
            'preparacion' => Str::random(30),
            'nota' => Str::random(30),
            'tipoComida' => Str::random(30),
            'totalKcal' => 500.59,
            'activo' => true,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
    }
}
