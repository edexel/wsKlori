<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class TablesColumn
 * 
 * @property int $idTableColumn
 * @property int|null $idTable
 * @property string $column
 * @property bool $visible
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 *
 * @package App\Models
 */
class TablesColumn extends Model
{
	use SoftDeletes;
	protected $table = 'tables_columns';
	protected $primaryKey = 'idTableColumn';

	protected $casts = [
		'idTable' => 'int',
		'visible' => 'bool'
	];

	protected $fillable = [
		'idTable',
		'column',
		'visible'
	];
}
