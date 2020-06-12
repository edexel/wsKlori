<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Carbon\Carbon;

class UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $usuarios = [
             [
                'username' => 'AdminUserName',
                'email' => 'admin@mail.com',
                'password' => Hash::make('test123'),
                'descripcion' => Str::random(30),
                'admin' => true,
                'tokenRecover' => Str::random(50),
                'activo' => true,
                'ultimaConexion' => Carbon::now()->format('Y-m-d H:i:s'),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'username' => 'TestUserName',
                'email' => 'usuario@mail.com',
                'password' => Hash::make('test123'),
                'descripcion' => Str::random(30),
                'admin' => false,
                'tokenRecover' => Str::random(50),
                'activo' => true,
                'ultimaConexion' => Carbon::now()->format('Y-m-d H:i:s'),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ]
        ];


        foreach ($usuarios as $u) {
            DB::table('usuario')->insert([
                'username' => $u['username'],
                'email' => $u['email'],
                'password' => $u['password'],
                'descripcion' => $u['descripcion'],
                'admin' => $u['admin'],
                'tokenRecover' => $u['tokenRecover'],
                'activo' => $u['activo'],
                'ultimaConexion' => $u['ultimaConexion'],
                'created_at' => $u['created_at']
            ]);
        }
    }
}
