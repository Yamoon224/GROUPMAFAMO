<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Booking
 * 
 * @property int $id
 * @property string $customer
 * @property string $phone
 * @property string $type
 * @property Carbon $begin
 * @property Carbon $end
 * @property float $amount
 * @property float $discount
 * @property string|null $details
 * @property int $room_id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property string|null $deleted_at
 * 
 * @property Room $room
 *
 * @package App\Models
 */
class Booking extends Model
{
	use SoftDeletes;

	protected $casts = [
		'begin' => 'datetime',
		'end' => 'datetime',
		'amount' => 'float',
		'discount' => 'float',
		'room_id' => 'int'
	];

	protected $guarded = [];

	public function room()
	{
		return $this->belongsTo(Room::class);
	}
}
