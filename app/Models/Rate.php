<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Rate
 * 
 * @property int $id
 * @property int $note
 * @property string|null $comments
 * @property int $room_id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property string|null $deleted_at
 * 
 * @property Room $room
 *
 * @package App\Models
 */
class Rate extends Model
{
	use SoftDeletes;

	protected $casts = [
		'note' => 'int',
		'room_id' => 'int'
	];

	protected $guarded = [];

	public function room()
	{
		return $this->belongsTo(Room::class);
	}
}
