<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Employee
 * 
 * @property int $id
 * @property string $name
 * @property string $phone
 * @property string|null $email
 * @property string $address
 * @property string $gender
 * @property string|null $photo
 * @property string $position
 * @property string $diploma
 * @property string $familystatus
 * @property string $contracttype
 * @property float $salary
 * @property float|null $prime
 * @property float|null $netsalary
 * @property string $ref
 * @property string|null $rib
 * @property string|null $bank
 * @property string $warrantyperson
 * @property string $warrantyphone
 * @property float $cnss
 * @property float $rts
 * @property float|null $acompte
 * @property float|null $sanction
 * @property string $issalary
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property Carbon|null $deleted
 * 
 * @property Collection|Affectation[] $affectations
 * @property Collection|Dotation[] $dotations
 * @property Collection|Payment[] $payments
 * @property Collection|Stoppage[] $stoppages
 *
 * @package App\Models
 */
class Employee extends Model
{
	use SoftDeletes;

	protected $casts = [
		'salary' => 'float',
		'prime' => 'float',
		'netsalary' => 'float',
		'cnss' => 'float',
		'rts' => 'float',
		'acompte' => 'float',
		'sanction' => 'float',
		'deleted' => 'datetime'
	];

	protected $guarded = [];

	public function affectations()
	{
		return $this->hasMany(Affectation::class);
	}

	public function dotations()
	{
		return $this->hasMany(Dotation::class);
	}

	public function payments()
	{
		return $this->hasMany(Payment::class);
	}

	public function stoppages()
	{
		return $this->hasMany(Stoppage::class);
	}

	public function hasOngoingStoppage() 
	{
		return $this->stoppages->firstWhere(fn($stoppage) => Carbon::parse($stoppage->ended_at)->isFuture())?->type;
	}

	public function alreadyPayByMonth($month, $year) 
	{
		return $this->payments->where('month', $month)->firstWhere('year', $year);
	}
}
