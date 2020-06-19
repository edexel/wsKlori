<?php


namespace App\Business\Cliente;
// Facades
use App\Models\Cliente;
//Models
use App\Models\ConfigApp;
//httpClient
Use App\Comunication\ClientHttp;

/**
 * Clase que autentifica a un cliente en el sistema Quetzal
 *
 * Created by Edewaldo Nuñez.
 * Date: 18 Jun 2020
 */
class Authenticate
{


     /**
     *  valida que el usuario exista en el sistema
     *
     * @return \App\Model\ConfigApp
     */
    public function __invoke()
    {
        
        // obtiene las credenciales del cliente 
        $Config = ConfigApp::select('config_app.username','config_app.password','config_app.urlApi')->first();

        //codifica valores a json
        $body  = json_encode([
            'username' => $Config->username,
            'password'   => $Config->password
        ]);
    
        // Forma url de la peticion
        $apiUrl = $Config->urlApi."auth/loginclient";

        // realiza peticion que inicia secion en quetzal
        $request = new  \App\Comunication\ClientHttp($apiUrl,'post',null,'body');
        $response = $request->send($body);

        //devuelve el contenido de la respuesta
        $responseBody = $response->getBody()->getContents();
        // devuuelve el estatus de la respuesta
        $responseStatus = $response->getStatusCode();
        //devuelve la frase de la respuesta
        $responsePhrase = $response->getReasonPhrase();
        // codifica los datos recibidos a json
        $responseBody = json_decode($responseBody);

        return ($responsePhrase == 'OK') ? [true, $responseBody]: [false,$responseBody,$responseStatus];
    }
}
