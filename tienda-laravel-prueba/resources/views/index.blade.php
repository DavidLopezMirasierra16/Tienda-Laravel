@extends('layout.pagina')

@section('title', 'Pagina de Inicio')

@section('content')
<header class="d-flex wrap mt-2">
    <div class="col-4">
        <a href="{{ url('/producto/create') }}" class="text-decoration-none">Crear un producto</a>
        <a href="{{ route('ruta_categorias') }}" class="text-decoration-none">Todas las categorias</a>
    </div>
    <div class="col-4 text-center">
        <input type="text" name="producto_buscar" id="producto_buscar" placeholder="Busca un producto">
        <input type="submit" value="Buscar" onclick="buscarInput()">
    </div>
    <div class="col-4 text-start">
        <select name="categoria_busqueda" id="categoria_busqueda" onchange="redirigirBusquedaCategoria()">
            <option value="0">Selecciona una opcion</option>
            @if (isset($categorias))
                @foreach ($categorias as $categoria)
                    <option value="{{$categoria->nombre}}">{{$categoria->nombre}}</option>
                @endforeach
            @else
                <option value="">No hay categorias</option>
            @endif
        </select>
    </div>
</header>
@if (session('error'))
    <div class="alert alert-danger mt-4">{{ session('error') }}</div>
@endif
@if (session('exito'))
    <div class="alert alert-success mt-4">{{ session('exito') }}</div>
@endif
<div class="mt-4">
    @if (isset($producto_busqueda))
        @if (count($productos)>0)
            <h4>Numero de Productos que contiene {{$producto_busqueda}}= {{count($productos)}}</h4>
        @else
            <h4>No hay Productos que contengan {{$producto_busqueda}}</h4>
        @endif
    @endif
</div>
<section class="m-auto">
    @if (!isset($producto_busqueda))
        <h4>Numero de Productos totales= {{count($productos)}}</h4>
    @endif
    @if ($productos != null)
        <table class="table">
            <thead>
                <tr>
                    {{-- <th>Imagen</th> --}}
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Precio</th>
                    <th>Categoría</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($productos as $producto)
                    <tr class="pb-2">
                        {{-- <td><img src="{{$producto->imagen}}" alt="No foto"></td> --}}
                        <td>{{$producto->nombre}}</td>
                        <td>{{$producto->descripcion}}</td>
                        <td>{{$producto->precio}}</td>
                        <td>{{$producto->categoria->nombre}}</td>
                        <td>
                            <a href="{{route('ruta_editar', ['id' => $producto->id])}}" class="text-decoration-none">Editar</a>
                            <a href="{{route('ruta_eliminar', ['id' => $producto->id])}}" class="text-decoration-none">Eliminar</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>No hay productos</p>
    @endif
</section>

<script> 
    /** 
     * Funcion que nos manda a la url
     */ 
    function redirigirBusquedaCategoria(){
        const opcion = document.getElementById("categoria_busqueda");
        let valor = opcion.value;

        if(valor==0){
            print("Hola");
        }else{
            window.location.href = "/productos/categoria/" + valor;
        }

    }

    /**
     * Funcion que nos busca por el input
     */ 
    function buscarInput(){
        const texto = document.getElementById("producto_buscar");
        let contenido = texto.value;

        if(contenido.trim()==""){
            window.location.href = "/";
        }else{
            window.location.href = "/productos/busqueda/"+contenido;
        }

    }
</script>
@endsection