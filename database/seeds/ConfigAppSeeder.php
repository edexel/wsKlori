<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;

class ConfigAppSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('config_app')->insert([
            'nombre' => 'ConfigApp 1',
            'logo' => Str::random(30),
            'terminos' => Str::random(30),
            'archivo' => Str::random(30),
            'correo' => 'user2@mail.com',
            'telefono' => 3315234859,
            'tokenApp' => Str::random(30),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
    }
}
