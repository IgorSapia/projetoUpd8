<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;


/**
 * Class Client
 * 
 * @property int $id
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
 *
 * @package App\Models
 */
class Client extends Model
{
	protected $table = 'clients';

	protected $casts = [
		'city_id' => 'int',
		'birthdate' => 'datetime',
		'gender' => 'int'
	];

	protected $fillable = [
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

	public function scopeName(Builder $query, $name){
		return $query->when($name, function ($query) use ($name) {
			return $query->where('name', 'like', '%' . $name . '%');
		});
	}

	public function scopeDocument(Builder $query, $documentValue){
		return $query->when($documentValue, function ($query) use ($documentValue) {
			return $query->where('document_value', $documentValue);
		});
	}

	public function scopeBirthdate(Builder $query, $birthdate){
		return $query->when($birthdate, function ($query) use ($birthdate) {
			return $query->where('birthdate', $birthdate);
		});
	}

	public function scopeGender(Builder $query, $gender){
		return $query->where('gender', $gender);
	}

	public function scopeState(Builder $query, $state)
    {
        return $query->when($state, function ($query) use ($state) {
            $query->whereHas('city', function ($query) use ($state) {
                $query->where('cities.state_id', $state);
            });
        });
    }

	public function scopeCity(Builder $query, $city)
    {
        return $query->when($city, function ($query) use ($city) {
			return $query->where('city_id', $city);
        });
    }
}
