<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class UsuarioSesion
 * 
 * @property int $idSesion
 * @property int $idUsuario
 * @property float $kcal
 * @property float $distribucion
 * @property float $peso
 * @property float $talla
 * @property float $imc
 * @property float $grasa
 * @property float $agua
 * @property float $medidaCc
 * @property float $medidaCb
 * @property float $medidaPcb
 * @property float $medidaPct
 * @property float $medidaPcse
 * @property float $medidaPcsi
 * @property string $observaciones
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 * 
 * @property Usuario $usuario
 * @property Collection|PlanSesion[] $plan_sesions
 *
 * @package App\Models
 */
class UsuarioSesion extends Model
{
	use SoftDeletes;
	protected $table = 'usuario_sesion';
	protected $primaryKey = 'idSesion';

	protected $casts = [
		'idUsuario' => 'int',
		'kcal' => 'float',
		'distribucion' => 'float',
		'peso' => 'float',
		'talla' => 'float',
		'imc' => 'float',
		'grasa' => 'float',
		'agua' => 'float',
		'medidaCc' => 'float',
		'medidaCb' => 'float',
		'medidaPcb' => 'float',
		'medidaPct' => 'float',
		'medidaPcse' => 'float',
		'medidaPcsi' => 'float'
	];

	protected $fillable = [
		'idUsuario',
		'kcal',
		'distribucion',
		'peso',
		'talla',
		'imc',
		'grasa',
		'agua',
		'medidaCc',
		'medidaCb',
		'medidaPcb',
		'medidaPct',
		'medidaPcse',
		'medidaPcsi',
		'observaciones'
	];

	public function usuario()
	{
		return $this->belongsTo(Usuario::class, 'idUsuario');
	}

	public function plan_sesions()
	{
		return $this->hasMany(PlanSesion::class, 'idSesion');
	}
}
