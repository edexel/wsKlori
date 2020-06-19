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
 * Class Recetario
 * 
 * @property int $idRecetario
 * @property string $nombre
 * @property string $descripcion
 * @property string $ingredientes
 * @property string $preparacion
 * @property string $nota
 * @property string $tipoComida
 * @property float $totalKcal
 * @property bool $activo
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 * 
 * @property Collection|PlanRecetario[] $plan_recetarios
 *
 * @package App\Models
 */
class Recetario extends Model
{
	use SoftDeletes;
	protected $table = 'recetario';
	protected $primaryKey = 'idRecetario';

	protected $casts = [
		'totalKcal' => 'float',
		'activo' => 'bool'
	];

	protected $fillable = [
		'nombre',
		'descripcion',
		'ingredientes',
		'preparacion',
		'nota',
		'tipoComida',
		'totalKcal',
		'activo'
	];

	public function plan_recetarios()
	{
		return $this->hasMany(PlanRecetario::class, 'idRecetario');
	}
}
