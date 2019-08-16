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
                        Editar producto
                    </div>
                    <div class="body">
                        <form action="{{ route('products.update', $producto->id) }}" method="POST">
                            @method('put')
                            @csrf
                            <div class="form-group">
                                <label for="">Descripción</label>
                                <input type="text" class="form-control" name="descripcion" id="descripcion" value="{{ $producto->description }}">
                            </div>
                            <div class="form-group">
                                <label for="">Precio</label>
                                <input type="text" class="form-control" name="precio" id="precio" value="{{ $producto->price }}">
                            </div>
                            <button type="submit" class="btn btn-success">Actualizar</button>
                            <a href="{{ route('products.index') }}" class="btn btn-danger">Cancelar</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ url('js/jquery-3.4.1.min.js') }} "></script>
    <script src="{{ url('js/bootstrap.min.js') }}" ></script>
</body>
</html>