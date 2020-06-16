<?php

namespace App\Http\Controllers\Web\User;
// Codes Responses

use App\Business\Usuario\GetPatients;
use App\Http\Controllers\Controller;
use App\Http\Responses\Response as ResponseJson;
use App\Models\Usuario;
use Symfony\Component\HttpFoundation\Response;
// Request
use Illuminate\Http\Request;
// Models



class GetAllController extends Controller
{

    public function __construct()
    {
        $this->result = new ResponseJson();
    }


    public function __invoke(Request $oRequest)
    {
        // Encuentra usuario de la base de datos
        $users = GetPatients::all();

        // return response()->json($this->oResponse->fnResult(true, $oUser, "Success"), 200);

        // construye respuesta correcta
        $result = $this->result->build($this->STATUS_OK, $users, $users->count(), 'Usuario ha iniciado sesión correctamente');

        // response el resultado con su codigo Http
        return response()->json($result, Response::HTTP_OK);
    }
}
// 