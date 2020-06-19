<?php

namespace App\Comunication;

// Guzzle es un cliente para peticiones HTTP
use GuzzleHttp\Client;

/**
 * Clase para realizar peticiones HTTP
 * 
 * Creado por: Joel Valdivia
 * Fecha: 28 Nov 19
 */
class ClientHttp
{
    public static $GET = 'get';
    public static $POST = 'post';
    public static $PUT = 'put';
    public static $DELETE = 'delete';
    public static $PATCH = 'patch';

    /**
     * Constructor de la clase que incializa el cliente para peticiones http
     */
    public function __construct($url, $typeRequest, $headers = null, $type = 'body')
    {
        $this->client = new Client();
        $this->URL = $url;
        $this->TYPE_REQUEST = $typeRequest;
        $this->headers = $headers ? $headers : ['Content-Type' => 'application/json'];
        $this->type = $type;
    }

    /**
     * Realiza una petición Http con la libreria Guzzle
     */
    public function send($dataBody = null)
    {

        $request = null;

        // construye la informacion a enviar
        $data = [
            'headers' => $this->headers,
            'http_errors' => false,
            // 'connect_timeout' => 1.2
        ];

        // elije la manera en que será enviados los datos
        switch ($this->type) {
            case 'body':
                $data['body'] = $dataBody;
                break;
            case 'json':
                $data['json'] = $dataBody;
                break;
            case 'form_params':
                $data['form_params'] = $dataBody;
                break;
            default:
                $data['body'] = $dataBody;
                break;
        }
        
        // realiza la peticion dependiento el verbo http
        switch ($this->TYPE_REQUEST) {
            case self::$GET:
                // realiza la peticion GET
                $request = $this->client->get($this->URL, $data);
                break;
            case self::$POST:
                // realiza la peticion POST
                $request = $this->client->post($this->URL, $data);
                break;
            case self::$PUT:
                // realiza la peticion PUT
                $request = $this->client->put($this->URL, $data);
                break;
            case self::$DELETE:
                // realiza la peticion DELETE
                $request = $this->client->delete($this->URL, $data);
                break;
            default:
                break;
        }

        // regresa la respuesta de la peticion
        return $request;
    }
}
