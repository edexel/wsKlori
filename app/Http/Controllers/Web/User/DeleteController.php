<?php

namespace App\Http\Controllers\Web\User;
// Codes Responses

use App\Http\Controllers\Controller;
use App\Http\Responses\Response as ResponseJson;
use App\Models\Usuario;
use Symfony\Component\HttpFoundation\Response;
// Request
use App\Http\Requests\DeleteRequest;
// Models



class DeleteController extends Controller
{

    public function __construct()
    {
        $this->result = new ResponseJson();
    }

    private $message = 'No se encontró el usuario a eliminar';

    public function __invoke(DeleteRequest $request)
    {
        // Encuentra usuario de la base de datos
        // Obtenemos la información de la area
        $user = Usuario::find($request->id);
        $result = $this->result->build($this->STATUS_ERROR, $this->NO_RESULT, $this->NO_TOTAL, $this->message);

        // verifica que exista el registro
        if (!$user)
            return response()->json($result, Response::HTTP_NOT_FOUND);

        // actualiza el usuario que realizo la eliminacion y elimina logicamente el registro
        $user->delete();

        $this->message = 'Usuario eliminado correctamente';

        // construye respuesta correcta
        $result = $this->result->build($this->STATUS_OK, $this->message, $this->NO_TOTAL, $this->message);

        // response el resultado con su codigo Http
        return response()->json($result, Response::HTTP_OK);
    }
}
// 