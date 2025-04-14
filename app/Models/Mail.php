<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Mail
 * 
 * @property int $id
 * @property string $type
 * @property string $partner
 * @property string $subject
 * @property string $message
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property string|null $deleted_at
 *
 * @package App\Models
 */
class Mail extends Model
{
	use SoftDeletes;

	protected $guarded = [];
}
