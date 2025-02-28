<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class State
 * 
 * @property int $id
 * @property string $name
 * @property int $country_id
 * @property string $country_code
 * @property string|null $fips_code
 * @property string|null $iso2
 * @property string|null $type
 * @property float|null $latitude
 * @property float|null $longitude
 * @property Carbon|null $created_at
 * @property Carbon $updated_at
 * @property bool $flag
 * @property string|null $wikiDataId
 * 
 * @property Country $country
 * @property Collection|City[] $cities
 *
 * @package App\Models
 */
class State extends Model
{
	protected $table = 'states';

	protected $casts = [
		'country_id' => 'int',
		'latitude' => 'float',
		'longitude' => 'float',
		'flag' => 'bool'
	];

	protected $fillable = [
		'name',
		'country_id',
		'country_code',
		'fips_code',
		'iso2',
		'type',
		'latitude',
		'longitude',
		'flag',
		'wikiDataId'
	];

	public function country()
	{
		return $this->belongsTo(Country::class);
	}

	public function cities()
	{
		return $this->hasMany(City::class);
	}
}
