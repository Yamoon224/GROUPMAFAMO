<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Stoppage
 * 
 * @property int $id
 * @property string $type
 * @property int|null $duration
 * @property string $reason
 * @property int $employee_id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property string|null $deleted_at
 * 
 * @property Employee $employee
 *
 * @package App\Models
 */
class Stoppage extends Model
{
	use SoftDeletes;

	protected $casts = [
		'employee_id' => 'int'
	];

	protected $guarded = [];

	public function employee()
	{
		return $this->belongsTo(Employee::class);
	}
}
