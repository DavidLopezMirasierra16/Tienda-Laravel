<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class DetalleCompra
 * 
 * @property int $id
 * @property int|null $compra_id
 * @property int|null $producto_id
 * @property int $cantidad
 * @property float $precio
 * 
 * @property Compra|null $compra
 * @property Producto|null $producto
 *
 * @package App\Models
 */
class DetalleCompra extends Model
{
	protected $table = 'detalle_compras';
	public $timestamps = false;

	protected $casts = [
		'compra_id' => 'int',
		'producto_id' => 'int',
		'cantidad' => 'int',
		'precio' => 'float'
	];

	protected $fillable = [
		'compra_id',
		'producto_id',
		'cantidad',
		'precio'
	];

	public function compra()
	{
		return $this->belongsTo(Compra::class);
	}

	public function producto()
	{
		return $this->belongsTo(Producto::class);
	}
}
