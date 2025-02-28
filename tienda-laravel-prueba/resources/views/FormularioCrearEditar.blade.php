@extends('layout.formulario')

@section('title', 'Formulario')
    
@section('contenido')

<div class="container mt-4">
    <div class="p-4">
        <form action="@if (isset($producto)) {{ route('ruta_actualizar', ['id' => $producto->id]) }} @else {{ route('ruta_aceptar') }} @endif" method="POST">
            @csrf
            <h3 class="text-center mb-4">{{ isset($producto) ? 'Editar Producto' : 'Crear un Producto' }}</h3>
            
            <!--Nombre-->
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre</label>
                <input required type="text" id="nombre" name="nombre" class="form-control" value="@if (isset($producto)) {{$producto->nombre}} @endif">
            </div>
            
            <!--Descripción-->
            <div class="mb-3">
                <label for="descripcion" class="form-label">Descripción</label>
                <input required type="text" id="descripcion" name="descripcion" class="form-control" value="@if (isset($producto)) {{$producto->descripcion}} @endif">
            </div>
            
            <!--Imagen-->
            <div class="mb-3">
                <label for="imagen" class="form-label">Imagen</label>
                <input type="text" id="imagen" name="imagen" class="form-control" value="@if (isset($producto)) {{$producto->imagen}} @endif">
            </div>
            
            <div class="d-flex wrap justify-content-between">
                <!--Precio-->
                <div class="mb-3 col-5">
                    <label for="precio" class="form-label">Precio</label>
                    <input required type="text" id="precio" name="precio" class="form-control" value="@if (isset($producto)) {{$producto->precio}} @endif">
                </div>
                
                <!--Categoría-->
                <div class="mb-3 col-5">
                    <label for="categoria" class="form-label">Categoría</label>
                    <select name="categoria" id="categoria" class="form-select">
                        @if (isset($producto))
                            @foreach ($categorias as $categoria)
                                <option value="{{$categoria->nombre}}" @if ($producto->categoria->nombre == $categoria->nombre) selected @endif>
                                    {{$categoria->nombre}}
                                </option>
                            @endforeach
                        @else
                            <option value="0">Selecciona una opción</option>
                            @foreach ($categorias as $categoria)
                                <option value="{{$categoria->id}}">{{$categoria->nombre}}</option>
                            @endforeach
                        @endif
                    </select>
                </div>
            </div>

            <!--Boton-->
            <div class="text-center">
                <input type="submit" class="btn btn-primary" value="{{ isset($producto) ? 'Editar' : 'Crear Producto' }}">
            </div>
        </form>

        <!--Pagina principal-->
        <div class="text-center mt-3">
            <a href="{{ url('/') }}" class="btn btn-secondary">Volver a la página</a>
        </div>
    </div>
</div>

@endsection