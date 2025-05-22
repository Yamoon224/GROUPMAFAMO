<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Cashflow
 * 
 * @property int $id
 * @property string $label
 * @property float $amount
 * @property string|null $description
 * @property int $checkout_id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property string|null $deleted_at
 * 
 * @property Checkout $checkout
 *
 * @package App\Models
 */
class Cashflow extends Model
{
	use SoftDeletes;

	protected $casts = [
		'amount' => 'float',
		'checkout_id' => 'int'
	];

	protected $guarded = [];

	public function checkout()
	{
		return $this->belongsTo(Checkout::class);
	}
}
