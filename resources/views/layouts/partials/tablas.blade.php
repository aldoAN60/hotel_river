<table id="tabla-pendientes" class="table table-info">
    <thead>
        <tr>
            <th scope="col">Turno</th>
            <th scope="col">Usuario</th>
            <th scope="col">Pendiente</th>
            <th scope="col">tipo de prioridad</th>
            <th scope="col">departamento encargado</th>
            <th scope="col">Fecha de creacion</th>
            <th scope="col">Confirmar/Eliminar</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($pendientes as $pendiente)
        <tr id="{{ $pendiente->id }}" >
            <th scope="row">{{$pendiente->turno}}</th>
            <td>{{$pendiente->usuario}}</td>
            <td>{{$pendiente->pendiente}}</td>
            <td>{{$pendiente->prioridad}}</td>
            <td>{{$pendiente->departamento_encargado}}</td>
            <td>{{$pendiente->fecha_de_creacion}}</td>
            <td>
                <div class="cont-form">
                    @if ($pendiente->estatus === 'PENDIENTE')
                    <form  class="form" action="{{route('pendientes.confirmar',$pendiente->id)}}" method="post" data-id="{{ $pendiente->id }}" id="confirmar-pendiente" >
                        @csrf
                        @method('patch')
                        <button class="btn btn-success" id="btn-confirmar">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-circle" viewBox="0 0 16 16">
                                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                <path d="M10.97 4.97a.235.235 0 0 0-.02.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05z"/>
                            </svg>
                        </button>
                    </form>
                    <form class="form" action="{{route('pendientes.destroy',$pendiente->id)}}" method="post" data-id="{{ $pendiente->id }}" id="eliminar-pendiente">
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
    @if (request()->url() !== "http://127.0.0.1:8000/pendientes")
        
    <div class="cont-paginacion">{{$pendientes->appends(['id_buscar' => $busqueda])->links('vendor.pagination.bootstrap-5')}}</div>
        
    @else
        
    <div class="cont-paginacion">{{$pendientes->links('vendor.pagination.bootstrap-5')}}</div>
    
    @endif