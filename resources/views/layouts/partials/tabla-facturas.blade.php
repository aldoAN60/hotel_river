<table class="table  table-hover align-middle caption-top" id="tabla_facturas">
    <caption>Lista de seguimiento de facturas</caption>
    <thead  class="table-secondary">
        <tr class="align-middle text-center">
            <th scope="col">Habitación</th>
            <th scope="col">Huésped</th>
            <th scope="col">Noches</th>
            <th scope="col">Tipo de reservación</th>
            <th scope="col">Tarifa</th>
            <th scope="col">Tarifa sin impuestos</th>
            <th scope="col">Método de pago</th>
            <th scope="col">Últimos 4 dígitos</th>
            <th scope="col">Teléfono</th>
            <th scope="col">RFC</th>
            <th scope="col">Razón social</th>
            <th scope="col">Usuario que capturó</th>
            <th scope="col">Usuario que timbró</th>
            <th scope="col">Folio</th>
            <th scope="col">Correo</th>
            <th scope="col">Fecha de creación</th>
            <th scope="col">Estatus/eliminar</th>
        </tr>
    </thead>
    <tbody class="table-group-divider" >
        @foreach ($facturas as $factura)
        <tr class="{{$factura->status === "FACTURADO" ? "table-success" : ($factura->status === "NO FACTURA" ? "table-light" : "table-warning") }}
            text-center">
            <td>{{$factura->habitacion}}</td>
            <td>{{$factura->huesped}}</td>
            <td>{{$factura->numero_noches}}</td>
            <td>{{$factura->nombre}}</td>
            <td>${{$factura->tarifa}}</td>
            <td>${{$factura->tarifa_sin_imp}}</td>
            <td>{{$factura->metodo}}</td>
            <td>{{$factura->ult_4_digitos}}</td>
            <td>{{$factura->telefono}}</td>
            <td>{{$factura->RFC}}</td>
            <td>{{$factura->razon_social}}</td>
            <td>{{$factura->usuario_captura}}</td>
            <td>{{$factura->usuario_timbra}}</td>
            <td>{{$factura->folio_factura}}</td>
            <td>{{$factura->correo}}</td>
            <td>{{$factura->fecha_creacion}}</td>
            <td >
                <div class="cont-form d-flex justify-content-center">
                    @if ($factura->status === 'PENDIENTE')
                    @include('layouts.partials.modal-act-fac')
                    <form class="form" action="{{route('facturas.destroy', $factura->id)}}" method="post" data-id="{{ $factura->id }}" id="eliminar-factura">
                        @csrf
                        @method('delete')
                        <button class="btn btn-danger btn-sm" id="btn-eliminar">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                            <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6Z"/>
                            <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1ZM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118ZM2.5 3h11V2h-11v1Z"/>
                            </svg>
                        </button>
                    </form>
                    @else
                        <span class="text-success">
                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-check-circle-fill" viewBox="0 0 16 16">
                                <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                            </svg>
                        </span>
                    @endif
                </div>
            </td>
        </tr>    
        @endforeach
    </tbody>
</table>
@if (request()->url() !== "http://127.0.0.1:8000/seguimiento_factura")
        
<div class="cont-paginacion">
    {{ $facturas->appends(request()->except('page'))->links('vendor.pagination.bootstrap-5') }}
</div>

@else
    
<div class="cont-paginacion">{{$facturas->links('vendor.pagination.bootstrap-5')}}</div>

@endif

