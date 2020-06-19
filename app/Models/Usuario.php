<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Usuario
 * 
 * @property int $idUsuario
 * @property string $username
 * @property string $email
 * @property string $password
 * @property string $descripcion
 * @property bool $admin
 * @property string $tokenRecover
 * @property bool $activo
 * @property Carbon $ultimaConexion
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 *
 * @package App\Models
 */
class Usuario extends Model
{
	use SoftDeletes;
	protected $table = 'usuario';
	protected $primaryKey = 'idUsuario';

	protected $casts = [
		'admin' => 'bool',
		'activo' => 'bool'
	];

	protected $dates = [
		'ultimaConexion'
	];

	protected $hidden = [
		'password'
	];

	protected $fillable = [
		'username',
		'email',
		'password',
		'descripcion',
		'admin',
		'tokenRecover',
		'activo',
		'ultimaConexion'
	];
}
