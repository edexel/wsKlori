<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class EstadoCivil1Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'nombre' => 'Soltero',
                'descripcion' => 'Soltero',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'nombre' => 'Casado',
                'descripcion' => 'Casado',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'nombre' => 'Divorciado',
                'descripcion' => 'Divorciado',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'nombre' => 'Unión libre',
                'descripcion' => 'Unión libre',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
        ];

        
        DB::table('estado_civil')->insert($data);
    }
}
