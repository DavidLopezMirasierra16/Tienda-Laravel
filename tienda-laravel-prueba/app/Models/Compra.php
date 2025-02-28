<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Compra
 * 
 * @property int $id
 * @property int $usuario_id
 * @property string $fecha
 * @property float $total
 * 
 * @property Usuario $usuario
 * @property Collection|DetalleCompra[] $detalle_compras
 *
 * @package App\Models
 */
class Compra extends Model
{
	protected $table = 'compras';
	public $timestamps = false;

	protected $casts = [
		'usuario_id' => 'int',
		'total' => 'float'
	];

	protected $fillable = [
		'usuario_id',
		'fecha',
		'total'
	];

	public function usuario()
	{
		return $this->belongsTo(Usuario::class);
	}

	public function detalle_compras()
	{
		return $this->hasMany(DetalleCompra::class);
	}
}
