<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Categoria
 * 
 * @property int $id
 * @property string $nombre
 * @property string|null $descripcion
 * 
 * @property Collection|Producto[] $productos
 *
 * @package App\Models
 */
class Categoria extends Model
{
	protected $table = 'categorias';
	public $timestamps = false;

	protected $fillable = [
		'nombre',
		'descripcion'
	];

	public function productos()
	{
		return $this->hasMany(Producto::class);
	}

	public function categoria()
    {
        return $this->belongsTo(Categoria::class, 'categoria_id');
    }

}
