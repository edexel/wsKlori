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
 * Class GrupoAlimenticio
 * 
 * @property int $idGrupoAlimenticio
 * @property string $nombre
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 * 
 * @property Collection|Equivalencium[] $equivalencia
 * @property Collection|RacionesDiariasPlan[] $raciones_diarias_plans
 *
 * @package App\Models
 */
class GrupoAlimenticio extends Model
{
	use SoftDeletes;
	protected $table = 'grupo_alimenticio';
	protected $primaryKey = 'idGrupoAlimenticio';

	protected $fillable = [
		'nombre'
	];

	public function equivalencia()
	{
		return $this->hasMany(Equivalencium::class, 'idGrupoAlimenticio');
	}

	public function raciones_diarias_plans()
	{
		return $this->hasMany(RacionesDiariasPlan::class, 'idGrupoAlimenticio');
	}
}
