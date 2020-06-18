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
 * Class RutinaActividad
 * 
 * @property int $idRutinaActividad
 * @property string $nombre
 * @property bool $activo
 * @property string $descripcion
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 * 
 * @property Collection|RutinaSesion[] $rutina_sesions
 *
 * @package App\Models
 */
class RutinaActividad extends Model
{
	use SoftDeletes;
	protected $table = 'rutina_actividad';
	protected $primaryKey = 'idRutinaActividad';

	protected $casts = [
		'activo' => 'bool'
	];

	protected $fillable = [
		'nombre',
		'activo',
		'descripcion'
	];

	public function rutina_sesions()
	{
		return $this->hasMany(RutinaSesion::class, 'idRutinaActividad');
	}
}
