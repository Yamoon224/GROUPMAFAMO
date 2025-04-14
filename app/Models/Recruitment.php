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
 * Class Recruitment
 * 
 * @property int $id
 * @property string $title
 * @property string $description
 * @property string|null $document
 * @property Carbon $began_at
 * @property Carbon $ended_at
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property string|null $deleted_at
 * 
 * @property Collection|Applicant[] $applicants
 *
 * @package App\Models
 */
class Recruitment extends Model
{
	use SoftDeletes;

	protected $casts = [
		'began_at' => 'datetime',
		'ended_at' => 'datetime'
	];

	protected $guarded = [];

	public function applicants()
	{
		return $this->hasMany(Applicant::class);
	}
}
