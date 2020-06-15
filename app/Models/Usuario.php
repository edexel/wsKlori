<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $idUsuario
 * @property string $username
 * @property string $descripcion
 * @property string $password
 * @property string $email
 * @property boolean $admin
 * @property string $tokenRecover
 * @property integer $activo
 * @property string $ultima_conexion
 * @property string $created_at
 * @property string $updated_at
 * @property string $deleted_at
 * @property DipositivoUsuario[] $dipositivoUsuarios
 * @property InfoUsuario $infoUsuario
 * @property UsuarioSesion[] $usuarioSesions
 */
class Usuario extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'usuario';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'idUsuario';

    /**
     * @var array
     */
    protected $fillable = ['username', 'descripcion', 'password', 'email', 'admin', 'tokenRecover', 'activo', 'ultima_conexion', 'created_at', 'updated_at', 'deleted_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function dipositivoUsuarios()
    {
        return $this->hasMany('App\DipositivoUsuario', 'idUsuario', 'idUsuario');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function infoUsuario()
    {
        return $this->hasOne('App\InfoUsuario', 'idUsuario', 'idUsuario');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function usuarioSesions()
    {
        return $this->hasMany('App\UsuarioSesion', 'idUsuario', 'idUsuario');
    }
}
