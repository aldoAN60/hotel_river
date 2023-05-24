@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('panel de control') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                        <h3 class="text text-center">
                            {{ __('Usuario registrado con exito') }}
                            <br>
                            <a class="btn btn-success" href="{{route('inicio')}}">Regresar al inicio</a>
                            <a class="btn btn-success" href="{{route('pendientes.mostrar')}}">Ir a pendientes</a>
                            <a class="btn btn-success" href="{{route('facturas.index')}}">Ir a seguimiento de facturas</a>
                            
                        </h3>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
