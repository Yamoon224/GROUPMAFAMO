<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Dotation
 * 
 * @property int $id
 * @property int $qty
 * @property int $employee_id
 * @property int $equipment_id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property Employee $employee
 * @property Equipment $equipment
 *
 * @package App\Models
 */
class Dotation extends Model
{
	use SoftDeletes;

	protected $casts = [
		'qty' => 'int',
		'employee_id' => 'int',
		'equipment_id' => 'int'
	];

	protected $guarded = [];

	public function employee()
	{
		return $this->belongsTo(Employee::class);
	}

	public function equipment()
	{
		return $this->belongsTo(Equipment::class);
	}
}
