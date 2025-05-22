<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Appointment
 * 
 * @property int $id
 * @property string|null $company
 * @property string $visitor
 * @property string $phone
 * @property Carbon $began_at
 * @property Carbon $ended_at
 * @property Carbon $expected_at
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property string|null $deleted_at
 *
 * @package App\Models
 */
class Appointment extends Model
{
	use SoftDeletes;
	protected $guarded = [];
}
