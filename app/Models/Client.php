<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Client
 * 
 * @property int $id
 * @property int $user_id
 * @property int $city_id
 * @property string $name
 * @property string $document_value
 * @property Carbon $birthdate
 * @property int $gender
 * @property string $address
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property City $city
 * @property User $user
 *
 * @package App\Models
 */
class Client extends Model
{
	protected $table = 'clients';

	protected $casts = [
		'user_id' => 'int',
		'city_id' => 'int',
		'birthdate' => 'datetime',
		'gender' => 'int'
	];

	protected $fillable = [
		'user_id',
		'city_id',
		'name',
		'document_value',
		'birthdate',
		'gender',
		'address'
	];

	public function city()
	{
		return $this->belongsTo(City::class);
	}

	public function user()
	{
		return $this->belongsTo(User::class);
	}
}
