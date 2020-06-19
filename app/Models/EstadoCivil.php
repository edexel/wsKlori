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
 * Class EstadoCivil
 * 
 * @property int $idEstadoCivil
 * @property string $nombre
 * @property string $descripcion
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 * 
 * @property Collection|InfoUsuario[] $info_usuarios
 *
 * @package App\Models
 */
class EstadoCivil extends Model
{
	use SoftDeletes;
	protected $table = 'estado_civil';
	protected $primaryKey = 'idEstadoCivil';

	protected $fillable = [
		'nombre',
		'descripcion'
	];

	public function info_usuarios()
	{
		return $this->hasMany(InfoUsuario::class, 'idEstadoCivil');
	}
}
