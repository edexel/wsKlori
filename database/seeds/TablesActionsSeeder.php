<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
class TablesActionsSeeder extends Seeder
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
                'idAction' => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'idTable' => 1,
                'idAction' => 2,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ]
        ];

        DB::table('tables_actions')->insert($data);
    }
}
