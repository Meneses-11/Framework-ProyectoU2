@extends('plantillas.menuGerente')

@section('titulo')
Eventos
@endsection
@section('titulobar')
Empleado {{ Auth::user()->nombre }}
@endsection
@section('estilos')
    @can('viewAny', App\Models\Usuario::class)
        <link rel="stylesheet" href="/css/styleTabla.css">
        <style>
            .slider-container {
                display: flex; /* Establece un contenedor flexible para los elementos hijos */
                width: 100%;
                height:auto;
                overflow-x: scroll;
            }
            .slider-container img {
                flex: 0 0 50px;
                width: 50px;
                height: 50px;
            }
        </style>
    @else
        <link rel="stylesheet" href="/css/styleMenuClnt.css">
    @endcan
@endsection
@section('opcionesIzquierda')
    @can('viewAny', App\Models\Usuario::class)
        <li class="nav-item"><a class="nav-link active" aria-current="page" href="{{ route('usuario.inicio') }}">Administrar Usuarios</a></li>
        <li class="nav-item"><a class="nav-link active" aria-current="page" href="{{ route('paquete.index') }}">Administrar Paquetes</a></li>
        <li class="nav-item"><a class="nav-link active" aria-current="page" href="{{ route('servicio.inicio') }}">Administrar Servicios</a></li>
        <li class="nav-item"><a class="nav-link active" aria-current="page" href="{{ route('evento.mostrar') }}">Administrar Eventos</a></li>
    @endcan
@endsection
@section('opcionesDerecha')
<li><a class="dropdown-item" href="{{ route('cerrar_sesion') }}">Cerrar Sesión</a></li>
@endsection

@can('viewAny', App\Models\Usuario::class)

    @section('contenido')

    @extends('plantillas.tabla')
    @section('tituloTabla')
    <h2 style="padding-left: 18px; font-size: 1rem !important; font-weight: bold;">Lista de Eventos</h2>
    @endsection
    @section('btnTabla')
    <a style="margin-right: 2%; text-align: center !important; color: black !important; background: #ffffff;" href="{{ route('evento.create') }}" class="btn btn-success"><i class="fas fa-plus-circle"></i><span>Añadir Nuevo Evento</span></a>
    @endsection
    @section('columnas')
            <th>Usuario</th>
            <th>Paquete</th>
            <th>Precio</th>
            <th>Fecha</th>
            <th>Hora de inicio</th>
            <th>Hora de finalización</th>
            <th>Descripción</th>
            <th>Cantidad de personas</th>
            <th>Servicios</th>
            <th>Estatus</th>
            <th>Acciones</th>
    @endsection
    @section('tablaContenido')
    @php
        $evt = $eventos;
    @endphp

    @foreach ($evt as $e)
    <tr>
        <td>{{ $e->usuario->nombre}}</td>
        <td>{{ $e->paquete->nombre }}</td>
        <td>{{ $e->precio }}</td>
        <td>{{ $e->fecha }}</td>
        <td>{{ $e->hora_inicio }}</td>
        <td>{{ $e->hora_fin }}</td>
        <td>{{ $e->descripcion }}</td>
        <td>{{ $e->num_personas }}</td>
        <td>
            <ul >
                @foreach ($e->servicios as $servicio)
                <li >{{ $servicio->nombre }}</li>
                @endforeach
            </ul>

        {{--  <div class="d-inline-flex p-n2 align-items-center">
                <a href="{{ route('paquete.editar',$paquete->id_paquete) }}" class="edit" ><i class="fas fa-pen" data-toggle="tooltip" title="Editar"></i></a>
                <a href="#" class="delete" data-toggle="modal" data-target="#deleteModal{{ $paquete->id_paquete }}"><i class="fas fa-trash" data-toggle="tooltip" title="Eliminar"></i></a>
                {{-- <a href="{{ route('paquete.detalle',$paquete->id_paquete) }}"  ><i class="fas fa-info-circle" data-toggle="tooltip" title="Información"></i></a> --}
                <form id="form-activo-{{ $paquete->id_paquete }}" action="{{ route('paquete.activo', $paquete->id_paquete) }}" method="post">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="activo" value="{{ $paquete->activo }}">
                </form>
                <a href="#" onclick="event.preventDefault(); document.getElementById('form-activo-{{ $paquete->id_paquete }}').submit();"
                    @if($paquete->activo)
                        <i class="fas fa-eye text-success" title="Desactivar Paquete"></i>
                    @else>
                        <i class="fas fa-eye-slash text-muted" title="Activar Paquete"></i>
                    @endif
                </a>

            </div>
            --}}
        </td>
        <td>
            @if ($e->confirmacion == 1)
            <span class="text-success">Confirmado</span>
            @else
            <span class="text-danger">Sin confirmar</span>
            @endif
        </td>
        <td>
            <form action="{{ route('evento.confirmar', $e->id_evento) }}" method="POST">
                @csrf
                @method('PUT')
                <input type="hidden" name="confirmacion" value="1">
            </form>
            <a href="#" onclick="event.preventDefault(); document.getElementById('form-activo-{{ $e->id_evento }}').submit();"
                @if($e->confirmacion)
                    <i class="fas fa-eye text-success" title="Desactivar Paquete"></i>
                @else>
                    <i class="fas fa-eye-slash text-muted" title="Activar Paquete"></i>
                @endif
            </a>

        </td>


    </tr>
    <!-- Modal de confirmación para eliminar usuario -->
    <div class="modal fade" id="deleteModal{{ $e->id_evento}}" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel{{ $e->id_evento }}" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel{{ $e->id_evento }}">Confirmación de eliminación</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    ¿Está seguro que desea eliminar este paquete {{ $e->nombre }}?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <form action="{{ route('evento.destroy', $e->id_evento) }}" method="post">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="btn btn-danger">Eliminar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endforeach
    @endsection
    @endsection
@else
    @include('plantillas.error401')
@endcan
