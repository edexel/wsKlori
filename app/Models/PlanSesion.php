<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class PlanSesion
 * 
 * @property int $idPlanSesion
 * @property int $idSesion
 * @property string $nombre
 * @property Carbon $horaDesayuno
 * @property string $desayuno
 * @property Carbon $horaColacionMat
 * @property string $colacionMat
 * @property Carbon $horaComida
 * @property string $comida
 * @property Carbon $horaColacionVes
 * @property string $colacionVes
 * @property Carbon $horaCena
 * @property string $cena
 * @property string $indicaciones
 * @property string $liquidos
 * @property string $objetivos
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 *
 * @package App\Models
 */
class PlanSesion extends Model
{
	use SoftDeletes;
	protected $table = 'plan_sesion';
	protected $primaryKey = 'idPlanSesion';

	protected $casts = [
		'idSesion' => 'int'
	];

	protected $dates = [
		'horaDesayuno',
		'horaColacionMat',
		'horaComida',
		'horaColacionVes',
		'horaCena'
	];

	protected $fillable = [
		'idSesion',
		'nombre',
		'horaDesayuno',
		'desayuno',
		'horaColacionMat',
		'colacionMat',
		'horaComida',
		'comida',
		'horaColacionVes',
		'colacionVes',
		'horaCena',
		'cena',
		'indicaciones',
		'liquidos',
		'objetivos'
	];
}
