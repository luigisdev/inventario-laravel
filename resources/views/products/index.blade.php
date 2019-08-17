@extends('layouts.main')
@section('contenido')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <a href="{{ url('/home') }}" class="btn btn-warning">Atrás</a>
                        <h1>Listado de productos</h1>
                        <a href="{{ route('products.create') }}" class="btn btn-success float-right">Nuevo producto</a>
                    </div>
                    <div class="body">
                        @if(session('info'))
                        <div class="alert alert-success">
                            {{ session('info') }}
                        </div>
                        @endif
                        <table class="table table-hover table-sm">
                            <thead>
                                <th>Descripcion</th>
                                <th>Precio</th>
                                <th>Acciones</th>
                            </thead>
                            <tbody>
                                @foreach($productos as $producto)
                                <tr>
                                    <td>
                                        {{ $producto->description }}
                                    </td>
                                    <td>
                                        {{ $producto->price }}
                                    </td>
                                    <td>
                                        <a href="{{ route('products.edit', $producto->id) }}" class="btn btn-warning btn-sm">Editar</a>
                                        <a href="javascript: document.getElementById('delete-{{ $producto->id }}').submit();" class="btn btn-danger btn-sm">Eliminar</a>
                                        <form id="delete-{{ $producto->id }}" action="{{ route('products.destroy', $producto->id) }}" method="POST">
                                            @method('delete')
                                            @csrf
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer">
                        Bienvenido {{ auth()->user()->name }}
                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="btn btn-danger btn-sm float-right">
                        Logout
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection