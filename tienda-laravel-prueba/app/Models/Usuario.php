<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Usuario
 * 
 * @property int $id
 * @property string $nombre
 * @property string $email
 * @property string $password
 * @property int|null $rol_id
 * @property Carbon $fecha_registro
 * 
 * @property Role|null $role
 * @property Collection|Compra[] $compras
 *
 * @package App\Models
 */
class Usuario extends Model
{
	protected $table = 'usuarios';
	public $timestamps = false;

	protected $casts = [
		'rol_id' => 'int',
		'fecha_registro' => 'datetime'
	];

	protected $hidden = [
		'password'
	];

	protected $fillable = [
		'nombre',
		'email',
		'password',
		'rol_id',
		'fecha_registro'
	];

	public function role()
	{
		return $this->belongsTo(Role::class, 'rol_id');
	}

	public function compras()
	{
		return $this->hasMany(Compra::class);
	}
}
