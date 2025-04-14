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
 * Class Type
 * 
 * @property int $id
 * @property string $name
 * @property string|null $description
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property string|null $deleted_at
 * 
 * @property Collection|Room[] $rooms
 *
 * @package App\Models
 */
class Type extends Model
{
	use SoftDeletes;

	protected $guarded = [];

	public function rooms()
	{
		return $this->hasMany(Room::class);
	}
}
