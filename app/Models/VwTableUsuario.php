<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class VwTableUsuario
 * 
 * @property int $idUsuario
 * @property string $Usuario
 * @property string $Correo
 * @property int $idInfoUsuario
 * @property string $Nombre
 * @property string $Apellido
 * @property string $Género
 * @property float $Talla
 * @property string|null $Fecha Nacimiento
 * @property int $Ocupación
 * @property float $Estatura
 * @property int $idEstadoCivil
 * @property string $Estado Civil
 * @property string $Antecedente familiar
 * @property string $Antecedente personal
 * @property string $Medicamentos
 * @property string $Objetivos
 * @property string $Observaciones
 *
 * @package App\Models
 */
class VwTableUsuario extends Model
{
	protected $table = 'vw_table_usuario';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'idUsuario' => 'int',
		'idInfoUsuario' => 'int',
		'Talla' => 'float',
		'Ocupación' => 'int',
		'Estatura' => 'float',
		'idEstadoCivil' => 'int'
	];

	protected $fillable = [
		'idUsuario',
		'Usuario',
		'Correo',
		'idInfoUsuario',
		'Nombre',
		'Apellido',
		'Género',
		'Talla',
		'Fecha Nacimiento',
		'Ocupación',
		'Estatura',
		'idEstadoCivil',
		'Estado Civil',
		'Antecedente familiar',
		'Antecedente personal',
		'Medicamentos',
		'Objetivos',
		'Observaciones'
	];
}
