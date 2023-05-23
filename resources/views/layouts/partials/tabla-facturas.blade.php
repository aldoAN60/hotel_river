<table class="table table-info table-hover align-middle caption-top">
    <caption>Lista de seguimiento de facturas</caption>
    <thead  class="table-primary">
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
            <th scope="col">Estatus</th>
        </tr>
    </thead>
    <tbody class="table-group-divider">
        @foreach ($facturas as $factura)
        <tr {{--class="table-warning"--}} class="text-center">
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
            <td>
            @if ($factura->status === "PENDIENTE")
            <div class="d-flex justify-content-between">
            <p class="mt-1">{{$factura->folio_factura}}</p>
                <form action="" method="post" class="ms-3">
                    @csrf
                    @method('PATCH')
                    <button class="btn btn-warning btn-sm" id="editar_folio">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pen-fill" viewBox="0 0 16 16">
                            <path d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001z"/>
                          </svg>
                    </button>
                </form>
            </div>
            @else
            {{$factura->folio_factura}}
            @endif
            </>
            <td>{{$factura->correo}}</td>
            <td>{{$factura->fecha_creacion}}</td>
            <td>
                <div class="cont-form">
                    @if ($factura->status === 'PENDIENTE')
                    <form  class="form" action="{{route('facturas.update',$factura->id)}}" method="post" data-id="{{ $factura->id }}" id="confirmar-factura" >
                        @csrf
                        @method('patch')
                        <button class="btn btn-success" id="btn-confirmar">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-circle" viewBox="0 0 16 16">
                                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                <path d="M10.97 4.97a.235.235 0 0 0-.02.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05z"/>
                            </svg>
                        </button>
                    </form>
                    <form class="form" action="{{route('facturas.destroy', $factura->id)}}" method="post" data-id="{{ $factura->id }}" id="eliminar-factura">
                        @csrf
                        @method('delete')
                        <button class="btn btn-danger" id="btn-eliminar">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                            <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6Z"/>
                            <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1ZM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118ZM2.5 3h11V2h-11v1Z"/>
                            </svg>
                        </button>
                    </form>
                    @else
                        <span class="text-success" style="margin-left:20%;">
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
