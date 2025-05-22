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
 * Class Equipment
 * 
 * @property int $id
 * @property string $name
 * @property float $price
 * @property float $qty
 * @property string $unit
 * @property int $category_id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property string|null $deleted_at
 * 
 * @property Collection|Dotation[] $dotations
 *
 * @package App\Models
 */
class Equipment extends Model
{
	use SoftDeletes;

	protected $casts = ['price' => 'float', 'qty' => 'float'];

	protected $guarded = [];

	public function dotations()
	{
		return $this->hasMany(Dotation::class);
	}
}
