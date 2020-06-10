<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property int $id
 * @property string $username
 * @property string $email
 * @property string $password
 * @property string $descripcion
 * @property string $admin
 * @property string $tokenRecover
 * @property integer $activo
 * @property string $created_at
 * @property string $updated_at
 * @property string $deleted_at
 */
class Usuario extends Model
{
    use SoftDeletes;

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
    protected $primaryKey = 'id';

    /**
     * @var array
     */
    protected $fillable = ['username', 'email', 'password', 'descripcion', 'admin', 'tokenRecover', 'activo', 'created_at', 'updated_at', 'deleted_at'];

}
