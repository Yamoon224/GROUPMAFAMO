<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Affectation
 * 
 * @property int $id
 * @property string|null $position
 * @property int $employee_id
 * @property int $contract_id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property string|null $deleted_at
 * 
 * @property Contract $contract
 * @property Employee $employee
 *
 * @package App\Models
 */
class Affectation extends Model
{
	use SoftDeletes;

	protected $casts = [
		'employee_id' => 'int',
		'contract_id' => 'int'
	];

	protected $guarded = [];

	public function contract()
	{
		return $this->belongsTo(Contract::class);
	}

	public function employee()
	{
		return $this->belongsTo(Employee::class);
	}
}
