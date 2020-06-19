<?php

namespace App\Http\Controllers\Web\User;
// Codes Responses

use App\Http\Controllers\Controller;
use App\Http\Responses\Response as ResponseJson;
use App\Models\Usuario;
use Symfony\Component\HttpFoundation\Response;
// Request
use App\Http\Requests\Web\User\CreateRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\InfoUsuario;

// Models



class CreateController extends Controller
{
    const PATIENT = 0;
    const ACTIVE = 1;

    public function __construct()
    {
        $this->result = new ResponseJson();
    }

    private $message = 'No se encontró fue posible registrar al usuario. intente más tarde';

    public function __invoke(CreateRequest $request)
    {
        $provisionalPassword = 'dsadassd';
       
        $user = new Usuario;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->password = Hash::make($provisionalPassword);
        $user->descripcion = 'Usuario paciente';
        $user->tokenRecover = ' ';
        $user->admin = self::PATIENT;
        $user->activo = self::ACTIVE;
        $user->ultimaConexion = date('Y-m-d h:i:s');
        $user->created_at = date('Y-m-d h:i:s');
        $user->save();
        
        // Enviar correo con contraseña provisional
        $infoUser = new InfoUsuario;
        $infoUser->idUsuario = $user->idUsuario;
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
        $infoUser->created_at = date('Y-m-d h:i:s');
        $infoUser->save();
        
        $this->message = 'Usuario registrado correctamente';

        // construye respuesta correcta
        $result = $this->result->build($this->STATUS_OK, $this->message, $this->NO_TOTAL, $this->message);

        // response el resultado con su codigo Http
        return response()->json($result, Response::HTTP_OK);
    }
}
// 