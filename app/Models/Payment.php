<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Payment
 * 
 * @property int $id
 * @property float $salary
 * @property float|null $prime
 * @property float|null $tax
 * @property float|null $hta
 * @property float $amount
 * @property int $month
 * @property int $year
 * @property int $employee_id
 * @property int $checkout_id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property string|null $deleted_at
 * 
 * @property Checkout $checkout
 * @property Employee $employee
 *
 * @package App\Models
 */
class Payment extends Model
{
	use SoftDeletes;

	protected $casts = [
		'salary' => 'float',
		'prime' => 'float',
		'tax' => 'float',
		'hta' => 'float',
		'amount' => 'float',
		'month' => 'int',
		'year' => 'int',
		'employee_id' => 'int',
		'checkout_id' => 'int'
	];

	protected $guarded = [];

	public function checkout()
	{
		return $this->belongsTo(Checkout::class);
	}

	public function employee()
	{
		return $this->belongsTo(Employee::class);
	}
}
