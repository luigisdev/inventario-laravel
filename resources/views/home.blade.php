@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Tablero Principal</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <h2><strong>Ingresa a la sección en el boton</strong></h2>
                    <br>
                    <br>
                    <hr>
                    <a href="{{ url('/products') }}" class="btn btn-primary float-right">Productos</a>
                    <br>
                    <br>
                    <hr>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
