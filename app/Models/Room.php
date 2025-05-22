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
 * Class Room
 * 
 * @property int $id
 * @property string $address
 * @property float $price
 * @property string|null $description
 * @property int|null $type_id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property string|null $deleted_at
 * 
 * @property Establishment|null $type
 * @property Collection|Booking[] $bookings
 * @property Collection|Image[] $images
 * @property Collection|Rate[] $rates
 *
 * @package App\Models
 */
class Room extends Model
{
	use SoftDeletes;

	protected $casts = [
		'price' => 'float',
		'type_id' => 'int'
	];

	protected $guarded = [];

	public function establishment()
	{
		return $this->belongsTo(Establishment::class);
	}

	public function bookings()
	{
		return $this->hasMany(Booking::class);
	}

	public function images()
	{
		return $this->hasMany(Image::class);
	}

	public function rates()
	{
		return $this->hasMany(Rate::class);
	}

	public function isCurrentlyFree()  
	{
		// return Carbon::parse($this->bookings->sortByDesc('end_date')->first())->isPast();
		return $this->status == 'LIBRE';
	}
}
