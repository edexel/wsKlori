<?php

namespace App\Http\Controllers\Web\User;
// Codes Responses

use App\Http\Controllers\Controller;
use App\Http\Responses\Response as ResponseJson;
use App\Models\Usuario;
use Symfony\Component\HttpFoundation\Response;
// Request
use App\Http\Requests\Web\User\UpdateRequest;
use App\Models\InfoUsuario;

// Models



class UpdateController extends Controller
{

    public function __construct()
    {
        $this->result = new ResponseJson();
    }

    private $message = 'No se encontró el usuario a modificar';

    public function __invoke(UpdateRequest $request)
    {

        $user = Usuario::find($request->id);
        $result = $this->result->build($this->STATUS_ERROR, $this->NO_RESULT, $this->NO_TOTAL, $this->message);

        if (!$user)
            return response()->json($result, Response::HTTP_NOT_FOUND);

        $user->username = $request->username;
        $user->email = $request->email;
        $user->save();

        // Enviar correo con contraseña provisional
        $infoUser = InfoUsuario::find($user->idUsuario);
        $infoUser->nombre = $request->name;
        $infoUser->apellido = $request->lastname;
        $infoUser->fecha_nacimiento = $request->birthDate;
        $infoUser->genero = $request->genre;
        $infoUser->talla = $request->size;
        $infoUser->ocupacion = $request->occupation;
        $infoUser->estatura = $request->stature;
        $infoUser->idEstadoCivil = $request->idStatusCivil;
        $infoUser->antecedenteFamiliar = $request->family_background;
        $infoUser->antecedentePersonal = $request->personal_background;
        $infoUser->medicamentos = $request->medicines;
        $infoUser->objetivos = $request->objective;
        $infoUser->observaciones = $request->observation;
        $infoUser->save();

        $this->message = 'Usuario modificado correctamente';

        // construye respuesta correcta
        $result = $this->result->build($this->STATUS_OK, $this->message, $this->NO_TOTAL, $this->message);

        // response el resultado con su codigo Http
        return response()->json($result, Response::HTTP_OK);
    }
}
// 