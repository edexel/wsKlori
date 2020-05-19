<?php

namespace App\Http\Controllers\Admin\Usuario;
// Codes Responses
use App\Http\Responses\Response as ResponseJson;
use Symfony\Component\HttpFoundation\Response;
// Request
use Illuminate\Http\Request;
// Models
use App\DbModels\usuario;



class GetAllController
{

    public function __construct()
    {
        $this->oResponse = new ResponseJson();
    }
 

    public function __invoke(Request $oRequest)
    {
                
        try {
             // Encuentra usuario de la base de datos
             $oUser = usuario::All();
             
            return response()->json($this->oResponse->fnResult(true, $oUser, "Success"), 200);
        } catch (Exception $ex) {
            // Error
            return response()->json($this->oResponse->fnResult(false, null, 'Exception: ' . $ex), Response::HTTP_BAD_REQUEST);
        }
    }
}
// 