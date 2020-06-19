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
 * @property PlanSesion $plan_sesion
 * @property RutinaActividad $rutina_actividad
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

	public function plan_sesion()
	{
		return $this->belongsTo(PlanSesion::class, 'idPlanSesion');
	}

	public function rutina_actividad()
	{
		return $this->belongsTo(RutinaActividad::class, 'idRutinaActividad');
	}
}
