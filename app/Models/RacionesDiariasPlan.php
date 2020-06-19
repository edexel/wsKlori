<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class RacionesDiariasPlan
 * 
 * @property int $idRacionesDiariasPlan
 * @property int $idPlanSesion
 * @property int $idGrupoAlimenticio
 * @property int $caloriasTotales
 * @property int $racionDiaria
 * @property float $racionDiariaKcal
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 *
 * @package App\Models
 */
class RacionesDiariasPlan extends Model
{
	use SoftDeletes;
	protected $table = 'raciones_diarias_plan';
	protected $primaryKey = 'idRacionesDiariasPlan';

	protected $casts = [
		'idPlanSesion' => 'int',
		'idGrupoAlimenticio' => 'int',
		'caloriasTotales' => 'int',
		'racionDiaria' => 'int',
		'racionDiariaKcal' => 'float'
	];

	protected $fillable = [
		'idPlanSesion',
		'idGrupoAlimenticio',
		'caloriasTotales',
		'racionDiaria',
		'racionDiariaKcal'
	];
}
