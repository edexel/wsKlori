<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class ConfigApp
 * 
 * @property int $idConfigApp
 * @property string $username
 * @property string $password
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 *
 * @package App\Models
 */
class ConfigApp extends Model
{
	use SoftDeletes;
	protected $table = 'config_app';
	protected $primaryKey = 'idConfigApp';

	protected $hidden = [
		'password'
	];

	protected $fillable = [
		'username',
		'password'
	];
}
