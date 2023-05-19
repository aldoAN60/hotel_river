@extends('layouts.app')
@section('title','pendientes')
@section('js')
<script src="/js/confirmar_pendiente.js"></script>
<script src="/js/eliminar_pendiente.js"></script>
<script src="/js/toast.js"></script>
@endsection
@section('content')
<header class="text-center">
    <h1 class="pendiente">agrega los pendientes de tu turno</h1>
</header>
<main class="container text-center">
    <div>

        <form id="formulario-pendiente" class="form" method="POST" action="{{route('pendientes.guardar')}}" >
            @csrf
            <div class="row">
                <div class="col-sm-3 cont-input">
                    <label class="label" for="turno">Turno</label>
                    <select class="select input" name="turno" id="turno">
                        <option value="">turno</option>
                        <option value="1">turno 1</option>
                        <option value="2">turno 2</option>
                        <option value="3">turno 3</option>
                    </select>
                </div>
                <div class="col-sm-3 cont-input">
                    <label class="label" for="pendiente">Pendiente</label>
                    <textarea class="input textarea" name="pendiente" id="pendiente" placeholder="Ingresa un Pendiente"></textarea>
                </div>
                <div class="col-sm-3 cont-input">
                    <label class="label" for="prioridad">Tipo de prioridad</label>
                    <select class="select input" name="prioridad" id="prioridad">
                        <option value="">prioridad</option>
                        <option value="baja">baja</option>
                        <option value="media">media</option>
                        <option value="alta">alta</option>
                    </select>
                </div>
                
                <div class="col-sm-3 cont-input">
                    <label class="label" for="departamento">Departamento</label>
                    <select class="select input" name="departamento" id="departamento">
                        <option value="">Elige un departamento</option>
                        @foreach ($departamentos as $departamento)
                            <option value="{{$departamento->id}}">{{$departamento->nombre}}</option>                        
                        @endforeach
                    </select>        
                </div>
            
            </div>
            <button id="btn_agregar" class="btn btn-success form-btn" >Agregar pendiente</button>
        </form>
    </div>
</main>

<aside>
    <form action="{{route('pendientes.busqueda')}}" method="get">
        @csrf
        
        <a class="btn btn-primary" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
            busqueda avanzada
        </a>
        <div class="collapse" id="collapseExample">
            <div class="card card-body">
                <div class="container text-center">
                    <div class="row">
                        <div class="col-sm-2 cont-input">
                            <label class="label" for="turno">Turno</label>
                            <select class="select input" name="turno" id="turno">
                                <option>Turno</option>
                                <option value="1">turno 1</option>
                                <option value="2">turno 2</option>
                                <option value="3">turno 3</option>
                            </select>
                        </div>
                        <div class="col-sm-2 cont-input">
                            <label class="label" for="usuario">Usuario</label>
                            <select class="select input" name="usuario" id="usuario">
                                <option>usuario</option>
                                @foreach ($usuarios as $usuario)
                                <option value="{{$usuario->username}}">{{$usuario->username}}</option>                                    
                                @endforeach
                            </select>
                        </div>
                        <div class="col-sm-3 cont-input">
                            <label class="label" for="prioridad">Tipo de prioridad</label>
                            <select class="select input" name="prioridad" id="prioridad">
                                <option>prioridad</option>
                                <option value="baja">baja</option>
                                <option value="media">media</option>
                                <option value="alta">alta</option>
                            </select>
                        </div>
                        <div class="col-sm-3 cont-input">
                            <label class="label" for="departamento_encargado">Departamento</label>
                            <select class="select input" name="departamento_encargado" id="departamento_encargado">
                                <option>Elige un departamento</option>
                                @foreach ($departamentos as $departamento)
                                <option value="{{$departamento->nombre}}">{{$departamento->nombre}}</option>                        
                                @endforeach
                            </select>        
                        </div>
                        <div class="col-sm-2 cont-input">
                            <label class="label" for="estatus">Estatus</label>
                            <select class="select input" name="estatus" id="estatus">
                                <option>Estatus</option>
                                <option value="RESUELTO">RESUELTO</option>
                                <option value="PENDIENTE">PENDIENTE</option>
                            </select>
                        </div>
                    </div>
                    <button  class="btn btn-success" >Buscar pendiente</button>
                    <a role="button" class="btn btn-primary" href="{{route('pendientes.mostrar')}}">eliminar filtros</a>
                </div>
            </div>
        </div>
    </form>
</aside>



<section id="cont-tabla" class="table-responsive">
    @if ($pendientes->isEmpty())
    <h1 class="text text-center">No hay pendientes agregados aun</h1>    
    
    @else
    
    @include('layouts.partials.tablas')

    
    @endif
    </section>
@endsection