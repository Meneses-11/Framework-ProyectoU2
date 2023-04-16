@extends('plantillas.menuGerente')

@section('titulo')
Servicios
@endsection
@section('titulobar')
<div class="contentEmpresa ">
    <img src="{{ asset('img/logo.png') }}" alt="Logo" class="imgLogo">
    <div style=" font-weight: bold;">Admin Gerente Usuarios</div>
</div>
@endsection
@section('estilos')
<link rel="stylesheet" href="/css/styleTabla.css">
@endsection
@section('opcionesIzquierda')
<li class="nav-item"><a class="nav-link active" aria-current="page" href="{{ route('usuario.inicio') }}">Administrar Usuarios</a></li>
<li class="nav-item"><a class="nav-link active" aria-current="page" href="{{ route('paquete.index') }}">Administrar Paquetes</a></li>
<li class="nav-item"><a class="nav-link active" aria-current="page" href="{{ route('servicio.inicio') }}">Administrar Servicios</a></li>
@endsection
@section('opcionesDerecha')
<li><a class="dropdown-item" href="{{ route('login') }}">Cerrar Sesión</a></li>
@endsection


@section('contenido')

@extends('plantillas.tabla')
@section('tituloTabla')
<h2 style="padding-left: 18px; font-size: 1rem !important; font-weight: bold;">Lista de Servicios</h2>
@endsection
@section('btnTabla')
<a style="margin-right: 2%; text-align: center !important; color: black !important; background: #ffffff;" href="{{ route('servicio.crear') }}" class="btn btn-success"><i class="fas fa-plus-circle"></i><span>Añadir Nuevo Servicio</span></a>

@endsection
@section('columnas')
@section('columnas')
        <th>ID servicio</th>
        <th>Nombre</th>
        <th>Descripción</th>
        <th>Precio</th>
        <th>Opciones</th>
@endsection
@section('tablaContenido')
@php
    $servicios;
@endphp
@foreach ($servicios as $servi)
<tr>
    <td>{{ $servi->id_servicio }}</td>
    <td>{{ $servi->nombre }}</td>
    <td>{{ $servi->descripcion }}</td>
    <td>{{ $servi->precio }}</td>
    <td>
        <div class="d-inline-flex p-n2 align-items-center">
            <a href="{{ route('servicio.editar',$servi->id_servicio) }}" class="edit" ><i class="fas fa-pen" data-toggle="tooltip" title="Editar"></i></a>
            <a href="#" class="delete" data-toggle="modal" data-target="#deleteModal{{ $servi->id_servicio }}"><i class="fas fa-trash" data-toggle="tooltip" title="Eliminar"></i></a>
            <a href="{{ route('servicio.detalle',$servi->id_servicio) }}"  ><i class="fas fa-info-circle" data-toggle="tooltip" title="Información"></i></a>
        </div>
    </td>
</tr>
<!-- Modal de confirmación para eliminar usuario -->
<div class="modal fade" id="deleteModal{{ $servi->id_servicio }}" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel{{ $servi->id_servi }}" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel{{ $servi->id_servicio }}">Confirmación de eliminación</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                ¿Está seguro que desea eliminar este Servicio {{ $servi->nombre }}?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <form action="{{ route('servicio.destruir', $servi->id_servicio) }}" method="post">
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



