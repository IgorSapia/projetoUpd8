<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class City
 * 
 * @property int $id
 * @property int $state_id
 * @property string $title
 * @property int $iso
 * @property int $iso_ddd
 * @property int $status
 * @property string $slug
 * @property int $population
 * @property float $lat
 * @property float $long
 * @property float $income_per_capita
 * 
 * @property State $state
 * @property Collection|Client[] $clients
 *
 * @package App\Models
 */
class City extends Model
{
	protected $table = 'cities';
	public $timestamps = false;

	protected $casts = [
		'state_id' => 'int',
		'iso' => 'int',
		'iso_ddd' => 'int',
		'status' => 'int',
		'population' => 'int',
		'lat' => 'float',
		'long' => 'float',
		'income_per_capita' => 'float'
	];

	protected $fillable = [
		'state_id',
		'title',
		'iso',
		'iso_ddd',
		'status',
		'slug',
		'population',
		'lat',
		'long',
		'income_per_capita'
	];

	public function state()
	{
		return $this->belongsTo(State::class);
	}

	public function clients()
	{
		return $this->hasMany(Client::class);
	}
}
