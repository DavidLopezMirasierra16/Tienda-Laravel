<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductosController;

// Ruta principal
Route::get('/', [ProductosController::class, 'index'])->name('ruta_inicio');

// Ruta que usaremos para filtrar por categorias
Route::get('/productos/categoria/{categoria_busqueda}', [ProductosController::class, 'productosCategoria'])->name('ruta_buscar_categoria');

// Ruta que usaremos para el buscador de productos
Route::get('/productos/busqueda/{producto_busqueda}', [ProductosController::class,'productosBusqueda'])->name('ruta_busqueda_producto');

// Ruta que nos muestra las categorias y sus caracteristicas
route::get('/categorias', [ProductosController::class, 'datosCategorias'])->name('ruta_categorias');

//------------------------------------CRUD------------------------------------

Route::get('/producto/create', [ProductosController::class, 'create'])->name('ruta_crear');
Route::post('/producto/create', [ProductosController::class, 'store'])->name('ruta_aceptar');
route::get('/producto/edit/{id}', [ProductosController::class, 'edit'])->name('ruta_editar');
route::post('/producto/edit/{id}', [ProductosController::class, 'update'])->name('ruta_actualizar');
route::get('/producto/delete/{id}', [ProductosController::class, 'destroy'])->name('ruta_eliminar');

?>