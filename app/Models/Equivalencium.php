<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Equivalencium
 * 
 * @property int $idEquivalencia
 * @property int $idGrupoAlimenticio
 * @property string $nombre
 * @property string $porcion
 * @property float $kcal
 * @property string $descripcion
 * @property bool $activo
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 * 
 * @property GrupoAlimenticio $grupo_alimenticio
 *
 * @package App\Models
 */
class Equivalencium extends Model
{
	use SoftDeletes;
	protected $table = 'equivalencia';
	protected $primaryKey = 'idEquivalencia';

	protected $casts = [
		'idGrupoAlimenticio' => 'int',
		'kcal' => 'float',
		'activo' => 'bool'
	];

	protected $fillable = [
		'idGrupoAlimenticio',
		'nombre',
		'porcion',
		'kcal',
		'descripcion',
		'activo'
	];

	public function grupo_alimenticio()
	{
		return $this->belongsTo(GrupoAlimenticio::class, 'idGrupoAlimenticio');
	}
}
