<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="{{ url('css/bootstrap.min.css') }}">

    <title>Products</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Listado de productos
                        <a href="{{ route('products.create') }}" class="btn btn-success bn-sm float-right">Nuevo producto</a>
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
                </div>
            </div>
        </div>
    </div>
