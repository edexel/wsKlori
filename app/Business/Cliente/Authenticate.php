<?php


namespace App\Business\Cliente;
// Facades
use App\Models\Cliente;

// Facades
use Illuminate\Support\Facades\DB;
//Models
//httpClient
Use App\Comunication\ClientHttp;

/**
 * Clase de negocios del usuario
 *
 * Created by Edewaldo Nuñez.
 * Date: 15 Jun 2020
 */
class Authenticate
{


     /**
     *  valida que el usuario exista en el sistema
     *
     * @return \App\Model\config_app
     */
    public function __invoke()
    {
        
        // Encuentra usuario de la base de datos
        $Config = DB::table('config_app')->select('config_app.email','config_app.password')->first();

        // inicia secion en quetzal
        $request = new  ClientHttp();

        // inicia secion en quetzal


        return $Config;
    }
}
