<?php

namespace App\Http\Controllers\Web\Auth;

// extends
use App\Http\Controllers\Controller;
// responses
use App\Http\Responses\Response as ResponseJson;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Requests\Web\Auth\LoginRequest;
// resource
use App\Http\Resources\Web\Auth\LoginResource;


/**
 * Created by Ede Nunez
 * 
 * Modify by Joel Valdivia
 * Date: 09 Jun 2020
 * Description: Se modifica la ruta y se refactoriza el código
 *              tambien se agrega el swagger en la parte final del archivo
 */
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
    public function __invoke(LoginRequest $request)
    {
     
        // Valida usuario en la capa de negocios
        $ObjeClass = new \App\Business\Usuario\Login;
        $user = $ObjeClass($request->input('username'),$request->input('password'));

        // verifica si el usuario existe si no responde con error
        if (!$user){
             // se define la respuesta de error
            $result = $this->result->build($this->STATUS_ERROR, $this->NO_RESULT, $this->NO_TOTAL, $this->message);
              // response el resultado con su codigo Http
            return response()->json($result,  Response::HTTP_UNAUTHORIZED);   
        }
                  
        // Resultado mappeado
        $result = new LoginResource($user);
    
        // construye respuesta correcta
        $result = $this->result->build($this->STATUS_OK, $result, $this->NO_TOTAL, 'Usuario ha iniciado sesión correctamente');

        // response el resultado con su codigo Http
        return response()->json($result, Response::HTTP_OK);
    }
    /**
     * @OA\Post(
     *     path="/web/auth/login",
     *     tags={"Auth"},
     *     summary="Inicio de sesión de usuario",
     *     operationId="Login",
     *     @OA\Response(
     *         response=200,
     *         description="El usuario a iniciado sesión correctamente",
     *         @OA\JsonContent(ref="#/components/schemas/LoginResponse")
     *     ),
     *     @OA\Response(
     *         response=401,
     *         description="Usuario no fue autorizado",
     *         @OA\JsonContent(ref="#/components/schemas/ErrorResponse")
     *     ),
     *     @OA\RequestBody(
     *         description="Formato de envío de datos",
     *         @OA\MediaType(
     *             mediaType="application/json",
     *             @OA\Schema(
     *                 type="object",
     *                 @OA\Property(
     *                     property="username",
     *                     description="Nombre de usuario",
     *                     type="string",
     *                 ),
     *                 @OA\Property(
     *                     property="password",
     *                     description="Contraseña",
     *                     type="string"
     *                 )
     *             )
     *         )
     *     )
     * )
     */

    /**
     * @OA\Schema(
     *   schema="LoginResponse",
     *   @OA\Property(
     *     property="status",
     *     type="boolean"
     *   ),
     *   @OA\Property(
     *     property="message",
     *     type="string"
     *   ),
     *   @OA\Property(
     *     property="data",
     *     ref="#/components/schemas/LoginResponseData"
     *   )
     * )
     */

    /**
     * @OA\Schema(
     *   schema="LoginResponseData",
     *   @OA\Property(
     *     property="id",
     *     type="integer"
     *   ),
     *   @OA\Property(
     *     property="token",
     *     type="string"
     *   ),
     *   @OA\Property(
     *     property="username",
     *     type="string"
     *   ),
     *   @OA\Property(
     *     property="email",
     *     type="string"
     *   ),
     *   @OA\Property(
     *     property="admin",
     *     type="boolean"
     *   ),
     *   @OA\Property(
     *     property="created_at",
     *     type="string"
     *   )
     * )
     */
    /**
     * @OA\Schema(
     *   schema="ErrorResponse",
     *   @OA\Property(
     *     property="status",
     *     type="boolean"
     *   ),
     *   @OA\Property(
     *     property="message",
     *     type="string"
     *   )
     * )
     */
}
