<?php

namespace App\Http\Controllers\Web\Auth;

use App\Http\Responses\Response as ResponseJson;

// responses
use Symfony\Component\HttpFoundation\Response;
// Facades
use Illuminate\Support\Facades\Hash;
// Utils
use App\Utils\JwtToken;
//Models
use App\DbModels\usuario;
use App\Http\Controllers\Controller;
use App\Http\Requests\Web\Auth\LoginRequest;
// resource
use App\Http\Resources\Admin\Auth\LoginResource;



class LoginController extends Controller
{

    public function __construct()
    {
        $this->result = new ResponseJson();
    }
    private $message = 'Tu usuario y/o contraseña son incorrectos, por favor verifica tus datos';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    /**
     * @OA\Post(
     *     path="/web/auth/login",
     *     tags={"Auth"},
     *     summary="Login de usuario",
     *     operationId="Login",
     *     @OA\Response(
     *         response=405,
     *         description="Invalid input"
     *     ),
     *     @OA\RequestBody(
     *         description="Input data format",
     *         @OA\MediaType(
     *             mediaType="application/json",
     *             @OA\Schema(
     *                 type="object",
     *                 @OA\Property(
     *                     property="email",
     *                     description="Updated name of the pet",
     *                     type="string",
     *                 ),
     *                 @OA\Property(
     *                     property="password",
     *                     description="Updated status of the pet",
     *                     type="string"
     *                 )
     *             )
     *         )
     *     )
     * )
     */
    public function __invoke(LoginRequest $request)
    {

        // Encuentra usuario de la base de datos
        // $user = usuario::where('email', $request->input('username'))->first();
        $user = null;
        // verifica si el usuario existe con el status activo sino responde con error

        // se define la respuesta de error
        $result = $this->result->build($this->STATUS_ERROR, $this->NO_RESULT, $this->NO_TOTAL, $this->message);

        // verifica si el usuario existe sino responde con error
        if (!$user)
            return response()->json($result,  Response::HTTP_UNAUTHORIZED);

        // if (!$oUser)
        //     return response()->json($this->oResponse->fnResult(false, $this->message, $this->message),  Response::HTTP_UNAUTHORIZED);
        // Verifica la contraseña y genera un token sino responde con error
        if (!Hash::check($request->input('password'), $user->password))
            return response()->json($result, Response::HTTP_UNAUTHORIZED);
        // if (!Hash::check($oRequest->input('password'), $oUser->password))
        //     return response()->json($this->oResponse->fnResult(false, $this->message, $this->message), Response::HTTP_UNAUTHORIZED);

        // Se actualiza la última vez que inició sesión el usuario
        $user->lastSession = date("Y-m-d H:i:s");
        $user->save();

        // El usuario es válido. se asigna a el resultado el token.
        $usuario['token'] =  JwtToken::create($user);

        // Resultado mappeado
        $result = new LoginResource($usuario);

        $this->message = 'Usuario ha iniciado sesión correctamente';

        // construye respuesta correcta
        $respuesta = $this->respuesta->construir($this->STATUS_OK, $result, $this->NO_TOTAL, $this->message);

        // response el resultado con su codigo Http
        return response()->json($respuesta, Response::HTTP_OK);

        // $oUser['token']  = JwtToken::create($oUser);
        // // Resultado mappeado
        // $oResult = new LoginResource($oUser);

        // return response()->json($this->oResponse->fnResult(true, $oResult, "Success"), 200);
    }
}
