<?php

use Illuminate\Database\Seeder;

class AllTablesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            ActionsSeeder::class,
            TablesSeeder::class,
            TablesActionsSeeder::class,
            TablesColumnsSeeder::class,
        ]);
    }
}
