<?php

namespace App\Http\Controllers\Web\User;
// Codes Responses

use App\Business\Usuario\GetPatients;
use App\Http\Controllers\Controller;
use App\Http\Resources\Web\Actions\ActionResource;
use App\Http\Responses\Response as ResponseJson;
use App\Models\Table;
use App\Models\VwUsuario;
use App\Utils\BaseTable;
use Symfony\Component\HttpFoundation\Response;
// Request
use Illuminate\Http\Request;
// Models



class PaginateController extends Controller
{

    public function __construct()
    {
        $this->result = new ResponseJson();
    }


    public function __invoke(Request $oRequest)
    {
        // Encuentra usuarios de una vista en la base de datos
        $users = VwUsuario::paginate(10);
        $total = $users->total();
        $viewName = 'vw_table_usuario';

        // Obtiene todas las columnas de la base de datos
        $tableColumns = BaseTable::getTableColumns($viewName);
        // obtenemos las columnas que no se mostrarán de la BD
        $table = Table::where('name', $viewName)->first();

        // obtiene las columnas que se mostraran en la tabla
        $columns = BaseTable::getColumns($tableColumns, $table);

        $result = [
            'columns' =>$columns,
            'buttons' => ActionResource::collection($table->actions),
            'paginate' => $users
        ];

        // construye respuesta correcta
        $result = $this->result->build($this->STATUS_OK, $result, $total, 'Se han obtenido los usuarios registrados como pacientes correctamente');

        // response el resultado con su codigo Http
        return response()->json($result, Response::HTTP_OK);
    }
}
// 