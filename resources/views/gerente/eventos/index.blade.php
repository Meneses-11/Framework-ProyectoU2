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
        </td>
        <td>
            @if ($e->confirmacion == 2)
            <span class="text-success">Confirmado</span>
            @elseif($e->confirmacion == 0)
            <span class="text-danger">Sin confirmar</span>
            @else
            <span class="text-warning">Pendiente</span>
            @endif
        </td>
        <td>
            @if ($e->confirmacion == 0){{-- El evento no esta confirmado --}}


            @elseif($e->confirmacion == 1) {{-- El evento esta pendiente --}}
                <form action="{{ route('evento.confirmar', $e->id_evento) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="confirmacion" value="1">
                </form>
                <a href="#" onclick="event.preventDefault(); document.getElementById('form-activo-{{ $e->id_evento }}').submit();">
                    <i class="fas fa-thumbs-up text-success" title="Confirmar Evento"></i>
                </a>
                <a href="#" data-toggle="modal" data-target="#descriptionModal{{ $e->id_evento }}">
                    <i class="fas fa-times-circle text-danger" title="Denegar Evento"></i>
                </a>

                @endif {{-- el evento esta confirmado --}}

        </td>


    </tr>
    {{-- Modal para obtener xq no se puede confirmar el evento --}}
    <div class="modal fade" id="descriptionModal{{ $e->id_evento }}" tabindex="-1" role="dialog" aria-labelledby="descriptionModalLabel{{ $e->id_evento }}" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="descriptionModalLabel{{ $e->id_evento }}">Agregar descripción</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="form" action="{{ route('evento.denegar',$e->id_evento) }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="description">Descripción:</label>
                            <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-dark" onclick="submitForm()">Guardar</button>

                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                </div>
            </div>
        </div>
    </div>


    @endforeach
    @endsection
    @endsection
    @section('scripts')
    <script>
        function submitForm() {
          document.getElementById('form').submit();
          //alert('done');
        }
    </script>
    @endsection
@else
    @include('plantillas.error401')
@endcan
