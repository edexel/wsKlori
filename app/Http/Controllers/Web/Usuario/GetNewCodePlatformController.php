<?php

namespace App\Http\Controllers\Web\Auth;

// extends
use App\Http\Controllers\Controller;
// responses
use App\Http\Responses\Response as ResponseJson;
// Utils
use App\Utils\Functions;
//Models
use Firebase\JWT\JWT;
// requests
use Illuminate\Http\Request;
use App\Http\Requests\Auth\NewCodePlatformRquest;
// resource

// JWT
use Symfony\Component\HttpFoundation\Response;

class GetNewCodePlatformController extends Controller
{
   public function __construct()
    {
        $this->result = new ResponseJson();
    }
    //
    /**
     * Created by Ede Nunez
     *
     * Modify by Ede Nunez
     * Date: 10 Jun 2020
     * Description: Genera un nuevo codigo de acceso a plataforma, ingresando un codigo encriptado
     */
    private $message = 'código incorrecto';

    public function __invoke(NewCodePlatformRquest $request)
    {

        // Encuentra usuario de la base de datos
        $oClient = cliente::where('email', $code)->first();

        // se define la respuesta de error
        $result = $this->result->build($this->STATUS_ERROR, $this->NO_RESULT, $this->NO_TOTAL, $this->message);

        if (!$oClient) {
            return response()->json($result, Response::HTTP_UNAUTHORIZED);
        }
        
        //Crea el token para el cliente
        $code = JwtToken::createCodeClient($oClient->email);

        // construye respuesta correcta
        $result = $this->result->build($this->STATUS_OK, $result, $this->NO_TOTAL, $this->message);

        // response el resultado con su codigo Http
        return response()->json($result, Response::HTTP_OK);
    }

    /**
     * @OA\Post(
     *     path="/auth/GetNewCodePlatform",
     *     tags={"Auth"},
     *     summary="Genera codigo nuevo",
     *     operationId="GetNewCodePlatform",
     *     @OA\Response(
     *         response=200,
     *         description="Codigo generado correctamente",
     *         @OA\JsonContent(ref="#/components/schemas/GetNewCodePlatformResponse")
     *     ),
     *     @OA\Response(
     *         response=401,
     *         description="Codigo incorrecto",
     *         @OA\JsonContent(ref="#/components/schemas/ErrorResponse")
     *     ),
     *     @OA\RequestBody(
     *         description="Input data format",
     *         @OA\MediaType(
     *             mediaType="application/json",
     *             @OA\Schema(
     *                 type="object",
     *                 @OA\Property(
     *                     property="codigo",
     *                     description="codigo de validación",
     *                     type="string",
     *                 )
     *             )
     *         )
     *     ),
     *     security={
     *         {"authorization": {}}
     *     }
     * )
     */

    /**
     * @OA\Schema(
     *   schema="GetNewCodePlatformResponse",
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
     *     ref="#/components/schemas/GetNewCodePlatformResponseData"
     *   )
     * )
     */

    /**
     * @OA\Schema(
     *   schema="GetNewCodePlatformResponseData",
     *   @OA\Property(
     *     property="code",
     *     type="string"
     *  )
     * )
     */

}
