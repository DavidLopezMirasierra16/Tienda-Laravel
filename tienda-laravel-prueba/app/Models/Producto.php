<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Producto
 * 
 * @property int $id
 * @property string $nombre
 * @property string|null $descripcion
 * @property string|null $imagen
 * @property float $precio
 * @property int|null $categoria_id
 * @property int|null $stock
 * @property Carbon $fecha_creacion
 * 
 * @property Categoria|null $categoria
 * @property Collection|DetalleCompra[] $detalle_compras
 *
 * @package App\Models
 */
class Producto extends Model
{
	protected $table = 'productos';
	public $timestamps = false;

	protected $casts = [
		'precio' => 'float',
		'categoria_id' => 'int',
		'stock' => 'int',
		'fecha_creacion' => 'datetime'
	];

	protected $fillable = [
		'nombre',
		'descripcion',
		'imagen',
		'precio',
		'categoria_id',
		'stock',
		'fecha_creacion'
	];

	public function categoria()
	{
		return $this->belongsTo(Categoria::class);
	}

	public function detalle_compras()
	{
		return $this->hasMany(DetalleCompra::class);
	}
}
