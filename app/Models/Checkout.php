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
 * Class Checkout
 * 
 * @property int $id
 * @property string $name
 * @property string|null $description
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property string|null $deleted_at
 * 
 * @property Collection|Payment[] $payments
 *
 * @package App\Models
 */
class Checkout extends Model
{
	use SoftDeletes;

	protected $guarded = [];

	public function payments()
	{
		return $this->hasMany(Payment::class);
	}

	public function employees()
	{
		return $this->hasMany(Employee::class);
	}

	public function cashflows()
	{
		return $this->hasMany(Cashflow::class);
	}

	public function billings()
	{
		return $this->hasMany(Billing::class);
	}
}
