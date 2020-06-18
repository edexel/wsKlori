<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class TablesColumnsSeeder extends Seeder
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
                'idTable' => 1,
                'column' => 'idUsuario',
                'visible' => true,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'idTable' => 1,
                'column' => 'Usuario',
                'visible' => true,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'idTable' => 1,
                'column' => 'Correo',
                'visible' => true,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'idTable' => 1,
                'column' => 'idInfoUsuario',
                'visible' => false,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'idTable' => 1,
                'column' => 'Nombre',
                'visible' => true,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'idTable' => 1,
                'column' => 'Apellido',
                'visible' => true,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'idTable' => 1,
                'column' => 'Género',
                'visible' => false,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'idTable' => 1,
                'column' => 'Talla',
                'visible' => false,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'idTable' => 1,
                'column' => 'Edad',
                'visible' => true,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'idTable' => 1,
                'column' => 'Ocupación',
                'visible' => false,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'idTable' => 1,
                'column' => 'Estatura',
                'visible' => true,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'idTable' => 1,
                'column' => 'Estatus Civil',
                'visible' => false,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'idTable' => 1,
                'column' => 'Antecedente familiar',
                'visible' => false,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'idTable' => 1,
                'column' => 'Antecedente personal',
                'visible' => false,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'idTable' => 1,
                'column' => 'Medicamentos',
                'visible' => false,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'idTable' => 1,
                'column' => 'Objetivos',
                'visible' => false,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'idTable' => 1,
                'column' => 'Observaciones',
                'visible' => false,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'idTable' => 1,
                'column' => 'Acciones',
                'visible' => true,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
        ];

        DB::table('tables_columns')->insert($data);
    }
}
