<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class RestriccionPlan
 * 
 * @property int $idRestriccionPlan
 * @property int $idPlanSesion
 * @property int $idRestriccionAlimento
 * 
 * @property PlanSesion $plan_sesion
 * @property Alimento $alimento
 *
 * @package App\Models
 */
class RestriccionPlan extends Model
{
	protected $table = 'restriccion_plan';
	protected $primaryKey = 'idRestriccionPlan';
	public $timestamps = false;

	protected $casts = [
		'idPlanSesion' => 'int',
		'idRestriccionAlimento' => 'int'
	];

	protected $fillable = [
		'idPlanSesion',
		'idRestriccionAlimento'
	];

	public function plan_sesion()
	{
		return $this->belongsTo(PlanSesion::class, 'idPlanSesion');
	}

	public function alimento()
	{
		return $this->belongsTo(Alimento::class, 'idRestriccionAlimento');
	}
}
