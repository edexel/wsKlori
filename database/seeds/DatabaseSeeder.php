<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UsuarioSeeder::class,
            InfoUsuarioSeeder::class,
            UsuarioSesionSeeder::class,
            PlanSesionSeeder::class,
            RutinaActividadSeeder::class,
            RutinaSesionSeeder::class,
            RecetarioSeeder::class,
            PlanRecetarioSeeder::class,
            AlimentoSeeder::class,
            GrupoAlimenticioSeeder::class,
            EquivalenciaSeeder::class,
            RacionesDiariasPlanSeeder::class,
            DispositivoUsuarioSeeder::class,
        ]);
    }
}
