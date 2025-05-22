<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Billing
 * 
 * @property int $id
 * @property float $amount
 * @property float|null $discount
 * @property float|null $arrears
 * @property int $year
 * @property int $month
 * @property int $partner_id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property string|null $deleted_at
 * 
 * @property Quotation $quotation
 *
 * @package App\Models
 */
class Billing extends Model
{
	use SoftDeletes;

	protected $casts = [
		'amount' => 'float',
		'remain' => 'float',
		'quotation_id' => 'int'
	];

	protected $guarded = [];

	public function quotation()
	{
		return $this->belongsTo(Quotation::class);
	}

	public function checkout()
	{
		return $this->belongsTo(Checkout::class);
	}
}
