<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class InfoUsuario
 * 
 * @property int $idInfoUsuario
 * @property int $idUsuario
 * @property string $nombre
 * @property string $apellido
 * @property string $genero
 * @property float $talla
 * @property int $edad
 * @property int $ocupacion
 * @property float $estatura
 * @property int $estatusCivil
 * @property string $antecendenteFamiliar
 * @property string $antecendentePersonal
 * @property string $medicamentos
 * @property string $objetivos
 * @property string $observaciones
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 * 
 * @property Usuario $usuario
 *
 * @package App\Models
 */
class InfoUsuario extends Model
{
	use SoftDeletes;
	protected $table = 'info_usuario';
	protected $primaryKey = 'idInfoUsuario';

	protected $casts = [
		'idUsuario' => 'int',
		'talla' => 'float',
		'edad' => 'int',
		'ocupacion' => 'int',
		'estatura' => 'float',
		'estatusCivil' => 'int'
	];

	protected $fillable = [
		'idUsuario',
		'nombre',
		'apellido',
		'genero',
		'talla',
		'edad',
		'ocupacion',
		'estatura',
		'estatusCivil',
		'antecendenteFamiliar',
		'antecendentePersonal',
		'medicamentos',
		'objetivos',
		'observaciones'
	];

	public function usuario()
	{
		return $this->belongsTo(Usuario::class, 'idUsuario');
	}
}
