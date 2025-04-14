<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Image
 * 
 * @property int $id
 * @property string $link
 * @property string|null $description
 * @property int $room_id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property string|null $deleted_at
 * 
 * @property Room $room
 *
 * @package App\Models
 */
class Image extends Model
{
	use SoftDeletes;

	protected $casts = [
		'room_id' => 'int'
	];

	protected $guarded = [];

	public function room()
	{
		return $this->belongsTo(Room::class);
	}
}
