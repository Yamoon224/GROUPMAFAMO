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
 * Class Contract
 * 
 * @property int $id
 * @property string $ref
 * @property string $title
 * @property string|null $description
 * @property float $cost
 * @property float $workforce
 * @property string $status
 * @property int $partner_id
 * @property int $category_id
 * @property Carbon $began_at
 * @property Carbon $ended_at
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property string|null $deleted_at
 * 
 * @property Partner $partner
 * @property Collection|Affectation[] $affectations
 * @property Collection|Detail[] $details
 *
 * @package App\Models
 */
class Quotation extends Model
{
	use SoftDeletes;

	protected $casts = [
		'cost' => 'float',
		'workforce' => 'float',
		'partner_id' => 'int',
	];

	protected $guarded = [];

	public function partner()
	{
		return $this->belongsTo(Partner::class);
	}

	public function affectations()
	{
		return $this->hasMany(Affectation::class);
	}

	public function details()
	{
		return $this->hasMany(Detail::class);
	}

	public function billings()
	{
		return $this->hasMany(Billing::class);
	}
}
