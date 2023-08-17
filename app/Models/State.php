<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class State
 * 
 * @property int $id
 * @property string $title
 * @property string $letter
 * @property int $iso
 * @property string $slug
 * @property int $population
 * 
 * @property Collection|City[] $cities
 *
 * @package App\Models
 */
class State extends Model
{
	protected $table = 'states';
	public $timestamps = false;

	protected $casts = [
		'iso' => 'int',
		'population' => 'int'
	];

	protected $fillable = [
		'title',
		'letter',
		'iso',
		'slug',
		'population'
	];

	public function cities()
	{
		return $this->hasMany(City::class);
	}
}
