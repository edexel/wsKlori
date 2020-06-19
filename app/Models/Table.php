<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
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
}
