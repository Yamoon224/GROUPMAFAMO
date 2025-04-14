<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Detail
 * 
 * @property int $id
 * @property string $category
 * @property string $label
 * @property string $unit
 * @property float $qty
 * @property float $price
 * @property int $contract_id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property string|null $deleted_at
 * 
 * @property Contract $contract
 *
 * @package App\Models
 */
class Detail extends Model
{
	use SoftDeletes;

	protected $casts = [
		'qty' => 'float',
		'price' => 'float',
		'contract_id' => 'int'
	];

	protected $guarded = [];

	public function contract()
	{
		return $this->belongsTo(Contract::class);
	}
}
