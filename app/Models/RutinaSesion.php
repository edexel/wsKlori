<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class RutinaSesion
 * 
 * @property int $idRutinaSesion
 * @property int $idPlanSesion
 * @property int $idRutinaActividad
 *
 * @package App\Models
 */
class RutinaSesion extends Model
{
	protected $table = 'rutina_sesion';
	protected $primaryKey = 'idRutinaSesion';
	public $timestamps = false;

	protected $casts = [
		'idPlanSesion' => 'int',
		'idRutinaActividad' => 'int'
	];

	protected $fillable = [
		'idPlanSesion',
		'idRutinaActividad'
	];
}
