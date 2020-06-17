<?php

namespace App\Http\Controllers\Web\User;
// Codes Responses

use App\Business\Usuario\GetPatients;
use App\Http\Controllers\Controller;
use App\Http\Responses\Response as ResponseJson;
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
        // Obtiene todas las columnas de la base de datos
        $tableColumns = BaseTable::getTableColumns('vw_table_usuario');

        // Quita las columnas que no se necesitan mostrar en la tabla
        $withoutColumns = ['idInfoUsuario', 'Género', 'Talla', 'Ocupación', 'Estatus Civil', 'Antecedente familiar', 'Antecedente personal',
                        'Medicamentos', 'Objetivos', 'Observaciones'];
        $columns = BaseTable::cleanColumns($tableColumns, $withoutColumns);

        // Agrega botones a la tabla en la sección Acciones
        $buttons = array(
            'Asignación de perfil'=>array('bg-orange','fa-handshake'),
        );

        $result = [
            'columns' =>$columns,
            'buttons' => $buttons,
            'paginate' => $users
        ];
        // construye respuesta correcta
        $result = $this->result->build($this->STATUS_OK, $result, $total, 'Se han obtenido los usuarios registrados como pacientes correctamente');

        // response el resultado con su codigo Http
        return response()->json($result, Response::HTTP_OK);
    }
}
// 