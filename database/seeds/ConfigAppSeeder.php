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
            'username' => 'user2@mail.com',
            'password' => 'test123',
            'urlApi' => 'http://127.0.0.1:8001/api/vi/admin/',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
    }
}
