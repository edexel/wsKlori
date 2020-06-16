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
 */
class VwUsuario extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'vw_table_usuario';

}
