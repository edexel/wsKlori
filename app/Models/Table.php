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
 * Class Table
 * 
 * @property int $idTable
 * @property string $name
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 * 
 * @property Collection|Action[] $actions
 * @property Collection|TablesColumn[] $tables_columns
 *
 * @package App\Models
 */
class Table extends Model
{
	use SoftDeletes;
	protected $table = 'tables';
	protected $primaryKey = 'idTable';

	protected $fillable = [
		'name'
	];

	public function actions()
	{
		return $this->belongsToMany(Action::class, 'tables_actions', 'idTable', 'idAction')
					->withPivot('idTableAction', 'deleted_at')
					->withTimestamps();
	}

	public function tables_columns()
	{
		return $this->hasMany(TablesColumn::class, 'idTable');
	}
}
