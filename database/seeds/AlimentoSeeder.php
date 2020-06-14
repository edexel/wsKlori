<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;

class AlimentoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('alimento')->insert([
            'nombre' => 'Alimento 1',
            'img' => Str::random(30),
            'activo' => true,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
    }
}
