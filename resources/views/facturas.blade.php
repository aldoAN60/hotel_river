@extends('layouts.app')
@section('title','facturas')
@section('js')
<script src="/js/switch-factura.js"></script>
@endsection
@section('content')
<header>
    <h1 class="titulos text text-center">Seguimiento facturas</h1>
</header>
<main>
    <form action="{{route('facturas.create')}}" method="post">
        @csrf
        <div class="d-flex align-items-end flex-column me-5">
            <label for="telefono" class="form-label ">¿Facturacion?</label>
            <div class="form-check form-switch me-3">
                <input class="form-check-input" type="checkbox" role="switch" id="switch_factura" checked>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-1">
                    <div class="form-group">
                        <label for="habitacion">Habitación:</label>
                        <input type="number" class="form-control" name="habitacion" id="habitacion" placeholder="HAB">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="nombre">Huésped:</label>
                        <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Huésped">
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label for="tipo_reservacion">Tipo de reservación:</label>
                        <select class="form-select" name="tipo_reservacion" id="tipo_reservacion">
                            <option selected>Tipo</option>
                            @foreach ($tipo_reservaciones as $reservacion)
                            <option value="{{$reservacion->id}}">{{$reservacion->nombre}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label for="numero_noches">Número de noches:</label>
                        <input type="number" class="form-control" name="numero_noches" id="numero_noches" placeholder="Número de noches">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="telefono">Teléfono:</label>
                        <input type="number" class="form-control" name="telefono" id="telefono" placeholder="Número telefónico">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="RFC">RFC:</label>
                        <input type="text" class="form-control" name="RFC" id="RFC" placeholder="RFC">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="razon_social">Razón social:</label>
                        <input type="text" class="form-control" name="razon_social" id="razon_social" placeholder="Razón social">
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label for="metodo_pago">Método de pago:</label>
                        <select class="form-select" name="metodo_pago" id="metodo_pago">
                            <option selected>Método de pago</option>
                            @foreach ($metodos_pago as $metodo_pago)
                            <option value="{{$metodo_pago->id}}">{{$metodo_pago->metodo}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label for="ult_4_digitos">Últimos 4 dígitos:</label>
                        <input type="number" class="form-control" name="ult_4_digitos" id="ult_4_digitos" placeholder="4 dígitos de la tarjeta">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="tarifa">Tarifa:</label>
                        <input type="number" step="0.01" class="form-control" name="tarifa" id="tarifa" placeholder="Tarifa">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="tarifa_sin_imp">Tarifa sin impuestos:</label>
                        <input type="number" class="form-control" name="tarifa_sin_imp_mostrar" id="tarifa_sin_imp_mostrar" placeholder="Tarifa sin impuestos" disabled >
                        <input type="hidden" name="tarifa_sin_imp" id="tarifa_sin_imp">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="status">Status:</label>
                        <input type="text" class="form-control" name="status_mostrar" id="status_mostrar" placeholder="PENDIENTE" disabled>
                        <input type="hidden" name="status" id="status">
                    </div>
                </div>
            </div>
            <!-- Resto de los campos del formulario -->
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="id_usuario_captura">Usuario que captura:</label>
                        <input type="input"  class="form-control" value="{{$usuario_nombre}}" disabled>
                        <input type="hidden"  class="form-control" value="{{$usuario_id}}" name="id_usuario_captura" id="id_usuario_captura"> 
                        <!-- se mantiene en hidden el usuario que timbra ya que no se puede dejar vacio el 
                            campo en la base de datos, se actualizara el usuario que timbra cuando se 
                            ingrese el folio, ademas se mantiene una coherencia en caso de que no se facture
                        -->
                        <input type="hidden"  class="form-control" value="{{$usuario_id}}" name="id_usuario_timbra" id="id_usuario_timbra">
                    
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="correo">Correo:</label>
                        <input type="text" class="form-control" name="correo" id="correo" placeholder="Correo electrónico">
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-center">
                <button class="btn btn-success mt-4">capturar</button>
            </div>
        </div>
    </form>
</main>
<section class=" container-fluid table-responsive">
    @include('layouts.partials.tabla-facturas')
</section>



    @endsection