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
 * @property Collection|DispositivoUsuario[] $dispositivo_usuarios
 * @property Collection|InfoUsuario[] $info_usuarios
 * @property Collection|UsuarioSesion[] $usuario_sesions
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

	public function dispositivo_usuarios()
	{
		return $this->hasMany(DispositivoUsuario::class, 'idUsuario');
	}

	public function info_usuarios()
	{
		return $this->hasMany(InfoUsuario::class, 'idUsuario');
	}

	public function usuario_sesions()
	{
		return $this->hasMany(UsuarioSesion::class, 'idUsuario');
	}
}
