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
 * Class Partner
 * 
 * @property int $id
 * @property string $name
 * @property string $phone
 * @property string|null $email
 * @property string $address
 * @property string $owner
 * @property string|null $logo
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property Carbon|null $deleted
 * 
 * @property Collection|Affectation[] $affectations
 * @property Collection|Billing[] $billings
 * @property Collection|Contract[] $contracts
 *
 * @package App\Models
 */
class Partner extends Model
{
	use SoftDeletes;

	protected $casts = [
		'deleted' => 'datetime'
	];

	protected $guarded = [];

	public function affectations()
	{
		return $this->hasMany(Affectation::class);
	}

	public function billings()
	{
		return $this->hasMany(Billing::class);
	}

	public function contracts()
	{
		return $this->hasMany(Contract::class);
	}
}
