@extends('layouts.app')
@section('title','facturas')
@section('js')
    
@endsection
@section('content')
<header>
    <h1 class="titulos text text-center">Seguimiento facturas</h1>
</header>
<main>
    <form action="" method="post">
        <div class="conteiner text-center">
        <div class="row">
            <div class="col-sm-1">
                <label for="habitacion" class="form-label">Habitacion:</label>
                <input type="number" class="form-control from-control-sm" id="habitacion" placeholder="Numero">
            </div>
            <div class="col-sm-2">
                <label for="nombre" class="form-label">Huesped:</label>
                <input type="text" class="form-control from-control-sm" id="nombre" placeholder="Huesped">
            </div>
            <div class="col-sm-2">
                <label for="telefono" class="form-label">Telefono:</label>
                <input type="number" class="form-control from-control-sm" id="telefono" placeholder="numero telefonico">
            </div>
            <div class="col-sm-1">
                <label for="telefono" class="form-label">Factura?</label>
                <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked" checked>
                </div>
            </div>
            <div class="col-sm-2">
                <label for="RFC" class="form-label">RFC:</label>
                <input type="text" class="form-control from-control-sm" id="RFC" placeholder="RFC">
            </div>
            <div class="col-sm-2">
                <label for="razon_social" class="form-label">Razón social:</label>
                <input type="text" class="form-control from-control-sm" id="razon_social" placeholder="Razón social">
            </div>
            <div class="col-sm-2">
                <label for="numero_noches" class="form-label">Numero de noches:</label>
                <input type="number" class="form-control from-control-sm" id="numero_noches" placeholder="Numero de noches">
            </div>
            <div class="row">
                <div class="col-sm-2">
                    <label for="tipo_reservacion" class="form-label">Tipo de reservacion:</label>
                    <select class="form-select" id="id_tipo_reservacion">
                        <option selected>Tipo de reservacion</option>
                    </select>
                </div>
                <div class="col-sm-2">
                    <label for="metodo_pago" class="form-label">Metodo de pago:</label>
                    <select class="form-select" id="id_metodo_pago">
                        <option selected>Metodo de pago</option>
                    </select>
                </div>
                <div class="col-sm-2">
                    <label for="metodo_pago" class="form-label">Metodo de pago:</label>
                    <select class="form-select" id="id_metodo_pago">
                        <option selected>Metodo de pago</option>
                    </select>
                </div>
                <div class="col-sm-2">
                    <label for="ult_4_digitos" class="form-label">Ultimos 4 digitos:</label>
                    <input type="number" class="form-control from-control-sm" id="ult_4_digitos" placeholder="4 digitos de la tarjeta">    
                </div>
                <div class="col-sm-1">
                    <label for="tarifa" class="form-label">Tarifa:</label>
                    <input type="number" class="form-control from-control-sm" id="tarifa" placeholder="tarifa">    
                </div>
                <div class="col-sm-2">
                    <label for="tarifa_sin_imp" class="form-label">Tarifa sin inpuestos:</label>
                    <input type="number" class="form-control from-control-sm" id="tarifa_sin_imp" placeholder="" disabled >    
                </div>
                <div class="col-sm-1">
                    <label for="status" class="form-label">Status:</label>
                    <select class="form-select" id="estatus">
                        <option selected>Estatus</option>
                        <option value="PENDIENTE">Pendiente</option>
                        <option value="FACTURADO">Facturado</option>
                    </select>
                </div>                
            </div>
        </div>
    </div>
    </form>
</main>
    @endsection