@extends('plantillas.menuGerente')

@section('titulo')
Eventos
@endsection
@section('titulobar')
Empleado <b style="color: gold">{{ Auth::user()->nombre }} </b>
@endsection
@section('estilos')
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
.btn-abono {
        background-color: rgb(90, 200, 90) !important; /* Cambia el color de fondo a verde */
    }
.btn-img {
        background-color: rgb(255, 0, 85) !important; /* Cambia el color de fondo a rosa xd */
    }
.btn-abono i {
    color: rgb(0, 0, 0); /* Cambia el color del icono a gris */
}
</style>
@endsection
@section('opcionesIzquierda')

@endsection
@section('opcionesDerecha')
<li><a class="dropdown-item" href="{{ route('cerrar_sesion') }}">Cerrar Sesión</a></li>
@endsection

@section('contenido')

@extends('plantillas.tabla')
@section('tituloTabla')
<h2 style="padding-left: 18px; font-size: 1rem !important; font-weight: bold;">Lista de Eventos</h2>
@endsection
@section('btnTabla')

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
@can('confirmacion', $e)

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
        <a href="#" style="color: rgb(90, 200, 90) !important; " data-toggle="modal" data-target="#paymentModal{{ $e->id_evento }}" data-tooltip="Agregar abono" title="Agregar Abono">
            <i class="fas fa-money-bill-wave"></i>
        </a>
        @if ($e->pagos->count()!=0)
        <a href="#" class="" data-toggle="modal" data-target="#paymentsModal{{ $e->id_evento }}" data-tooltip="Ver historial de abonos" title="Historial de abonos">
            <i class="fas fa-list"></i>
        </a>
        <a href="{{ route('evento.images', ['evento' => $e]) }}" style="color: rgb(255, 0, 85) !important;" title="Imagenes del Evento">
            <i class="fas fa-images"></i>
        </a>
        @endif
    </td>
<!-- Modal de creación de abonos -->
<div class="modal fade" id="paymentModal{{ $e->id_evento }}" tabindex="-1" role="dialog" aria-labelledby="paymentModalLabel{{ $e->id_evento }}" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="paymentModalLabel{{ $e->id_evento }}">Confirmación de pago</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Evento: {{ $e->nombre }}</p>
                <p>Cliente: {{ $e->usuario->nombre }}</p>
                <form action="{{ route('empleado.store') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="cantidad">Cantidad:</label>
                        <input type="number" class="form-control" id="cantidad" name="cantidad" required>
                        <input type="hidden" value="{{ $e->id_evento }}" name="id_evento" >
                    </div>
                    <p>Descripción del evento: <br><br>{{ $e->descripcion }}</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Realizar Abono</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Modal de visualizacón de abonos -->
<div class="modal fade" id="paymentsModal{{ $e->id_evento }}" tabindex="-1" role="dialog" aria-labelledby="paymentsModalLabel{{ $e->id_evento }}" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="paymentsModalLabel{{ $e->id_evento }}">Historial de Abonos</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

            @foreach ($e->pagos as $pago)
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Detalle de abono</h5>
                    <ul>
                        <li>Fecha: {{ $pago->created_at->format('Y-m-d  H:m:s')}}</li>
                        <li>Cantidad: ${{ $pago->cantidad }}</li>
                    </ul>
                </div>
              </div>
              <br>
            @endforeach
            </div>
            <div class="modal-footer text-cente">
                <button type="button" class="btn btn-dark" data-dismiss="modal">Aceptar</button>
            </div>
        </div>
    </div>
</div>


@endcan

@endforeach

@endsection


@endsection


