<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Action
 * 
 * @property int $idAction
 * @property string $name
 * @property string $icon
 * @property string $class
 * @property string $action
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 *
 * @package App\Models
 */
class Action extends Model
{
	use SoftDeletes;
	protected $table = 'actions';
	protected $primaryKey = 'idAction';

	protected $fillable = [
		'name',
		'icon',
		'class',
		'action'
	];
}
