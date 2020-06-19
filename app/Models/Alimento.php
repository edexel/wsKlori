<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Alimento
 * 
 * @property int $idAlimento
 * @property string $nombre
 * @property string $img
 * @property bool $activo
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 *
 * @package App\Models
 */
class Alimento extends Model
{
	use SoftDeletes;
	protected $table = 'alimento';
	protected $primaryKey = 'idAlimento';

	protected $casts = [
		'activo' => 'bool'
	];

	protected $fillable = [
		'nombre',
		'img',
		'activo'
	];
}
