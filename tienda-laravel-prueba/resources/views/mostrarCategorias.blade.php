@extends('layout.categoriasExits')

@section('title', 'Categorias')

@section('contenido')
    <h3>{{$categorias_datos->count()}} categorias</h3>
    <div>
        @if (isset($categorias_datos))
            <table class="table">

                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Descripcion</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categorias_datos as $categoria)
                        <tr>
                            <td>{{$categoria->nombre}}</td>
                            <td>{{$categoria->descripcion}}</td>
                        </tr>
                    @endforeach
                </tbody>

            </table>
        @endif
    </div>
    <a href="{{ route('ruta_inicio') }}" class="btn btn-primary">Volver</a>
@endsection