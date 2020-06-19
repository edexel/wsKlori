<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class DispositivoUsuario
 * 
 * @property int $idDispositivoUsuario
 * @property int $idUsuario
 * @property string $modelo
 * @property string $plataforma
 * @property string $uuid
 * @property string $codigo
 * @property Carbon $fechaAlta
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 *
 * @package App\Models
 */
class DispositivoUsuario extends Model
{
	use SoftDeletes;
	protected $table = 'dispositivo_usuario';
	protected $primaryKey = 'idDispositivoUsuario';

	protected $casts = [
		'idUsuario' => 'int'
	];

	protected $dates = [
		'fechaAlta'
	];

	protected $fillable = [
		'idUsuario',
		'modelo',
		'plataforma',
		'uuid',
		'codigo',
		'fechaAlta'
	];
}
