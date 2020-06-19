<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class PlanRecetario
 * 
 * @property int $idPlanRecetario
 * @property int $idPlanSesion
 * @property int $idRecetario
 *
 * @package App\Models
 */
class PlanRecetario extends Model
{
	protected $table = 'plan_recetario';
	protected $primaryKey = 'idPlanRecetario';
	public $timestamps = false;

	protected $casts = [
		'idPlanSesion' => 'int',
		'idRecetario' => 'int'
	];

	protected $fillable = [
		'idPlanSesion',
		'idRecetario'
	];
}
