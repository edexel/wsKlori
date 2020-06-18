<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ActionsSeeder extends Seeder
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
                'name' => 'Modificar',
                'icon' => 'fa fa-edit',
                'class' => 'ml-auto bg-yellow',
                'action' => 'modify',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'name' => 'Eliminar',
                'icon' => 'fa fa-trash',
                'class' => 'ml-auto btn-danger',
                'action' => 'delete',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ]
        ];

        
        DB::table('actions')->insert($data);
    }
}
