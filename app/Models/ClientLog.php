<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ClientLog
 * 
 * @property int $id
 * @property string|null $exception
 * @property string|null $payload
 * @property string|null $table
 * @property string|null $comment
 * @property string|null $id_references
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @package App\Models
 */
class ClientLog extends Model
{
	protected $table = 'client_logs';

	protected $fillable = [
		'exception',
		'payload',
		'table',
		'comment',
		'id_references'
	];
}
