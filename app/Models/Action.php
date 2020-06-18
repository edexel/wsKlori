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
 * @property Collection|Table[] $tables
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

	public function tables()
	{
		return $this->belongsToMany(Table::class, 'tables_actions', 'idAction', 'idTable')
					->withPivot('idTableAction', 'deleted_at')
					->withTimestamps();
	}
}
