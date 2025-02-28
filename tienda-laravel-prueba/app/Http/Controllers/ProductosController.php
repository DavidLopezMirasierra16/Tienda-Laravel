<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\Categoria;

class ProductosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $productos = Producto::all();
        $categorias = Categoria::all();
        // Le pasamos a la vista index los datos almacenados en las variables productos y categorias
        return view('index', compact('productos', 'categorias'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categorias = Categoria::all();
        $FormularioEditar = null;
        return view('FormularioCrearEditar', compact('FormularioEditar', 'categorias'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $datos_formulario)
    {
        $producto = new Producto();

        $producto->nombre = $datos_formulario->nombre;
        $producto->descripcion = $datos_formulario->descripcion;
        $producto->imagen = $datos_formulario->imagen;
        $producto->precio = $datos_formulario->precio;
        $producto->categoria_id = $datos_formulario->categoria;
        $producto->save();

        return redirect('/')->with('exito', 'Producto' . $producto->nombre . ' creado con éxito');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $producto = Producto::find($id);
        $categorias = Categoria::all();

        if ($producto) {
            return view('FormularioCrearEditar', compact('producto', 'categorias'));
        }else{
            return redirect("/")->with('error', 'Producto con el id '. $id .' no encontrado');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $datos_formulario, string $id)
    {
        $producto = Producto::find($id);

        if ($producto) {
            $producto->nombre = $datos_formulario->nombre;
            $producto->descripcion = $datos_formulario->descripcion;
            $producto->imagen = $datos_formulario->imagen;
            $producto->precio = $datos_formulario->precio;
            $producto->categoria->nombre = $datos_formulario->categoria;
            $producto->save();

            //Me manda a la pagina principal y muestra ese mensaje
            return redirect('/')->with('exito', 'Producto ' . $producto->nombre . ' editado correctamente');
        } else {
            //Me devuelva al formulario
            return view('FormularioCrearEditar')->with('error', 'Error al editar el producto '. $datos_formulario->nombre);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Buscamos el producto en la BD por su id
        $producto = Producto::find($id);
        // Si el producto no existe mandamos un mensaje de error
        if (!$producto) {
            // Si no lo encuentra le mandamos al index mandandole un error
            return redirect('/')->with('error', 'Producto con id '. $id .' no encontrado');
        } else {
            // Si existe lo elimina
            $producto->delete();
            //redirigimos a la vista index con ese mensaje
            return redirect('/')->with('exito', 'Producto ' .$producto->nombre. ' con id ' . $id . ' eliminado con exito');
        }
    }

    // -------------------CREADAS------------------

    /**
     * Obtener todos los productos de una categoria
     */
    public function productosCategoria($categoria_busqueda)
    {
        $categorias = Categoria::all();
        //Busca la categoria por el nombre
        $categoria = Categoria::where('nombre', $categoria_busqueda)->first();
        //Si la categroia existe, productos sera un array con los productos de la categoria, sino, sera un array vacio
        $productos = ($categoria) ? $categoria->productos : [];
        //Devuelve la vista index con los productos y categorias y la categoria de busqueda
        return view('index', compact('productos', 'categorias', 'categoria_busqueda'));
    }

    /**
     * Funcion que nos busca por el nombre o la descripcion de un producto
     */
    public function productosBusqueda($producto_busqueda)
    {
        $categorias = Categoria::all();
        //Busca los productos por el nombre o la descripción
        $productos = Producto::where('nombre', 'like', '%' . $producto_busqueda . '%')
            ->orWhere('descripcion', 'like', '%' . $producto_busqueda . '%')
            ->get();
        //Devuelve la vista index con los productos y categorias y el producto de busqueda
        return view('index', compact('productos', 'categorias', 'producto_busqueda'));
    }

    /**
     * Funcion que nos obtiene todas las categorias
     */
    public function datosCategorias(){
        $categorias_datos = Categoria::all();
        // $num_productos = Categoria::with('productos')->get();

        return view('mostrarCategorias', compact('categorias_datos'));
    }

}
