<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Applicant
 * 
 * @property int $id
 * @property string $name
 * @property string $phone
 * @property string $address
 * @property string|null $parents
 * @property string $ref
 * @property string|null $photo
 * @property string|null $documents
 * @property int $recruitment_id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property Carbon|null $deleted
 * 
 * @property Recruitment $recruitment
 *
 * @package App\Models
 */
class Applicant extends Model
{
	use SoftDeletes;

	protected $casts = [
		'recruitment_id' => 'int',
		'deleted' => 'datetime'
	];

	protected $guarded = [];

	public function recruitment()
	{
		return $this->belongsTo(Recruitment::class);
	}
}
