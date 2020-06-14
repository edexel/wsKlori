<?php

use Illuminate\Database\Seeder;

class PlanRecetarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('plan_recetario')->insert([
            'idPlanSesion' => 1,
            'idRecetario' => 1,
        ]);
    }
}
