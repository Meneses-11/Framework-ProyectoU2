@extends('plantillas.menuGerente')

@section('titulo')
Paquetes
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
<h2 style="padding-left: 18px; font-size: 1rem !important; font-weight: bold;">Lista de Paquetes</h2>
@endsection
@section('btnTabla')
<a style="margin-right: 2%; text-align: center !important; color: black !important; background: #ffffff;" href="{{ route('paquete.create') }}" class="btn btn-success"><i class="fas fa-plus-circle"></i><span>Añadir Nuevo Paquete</span></a>
@endsection
@section('columnas')
        <th >ID Paquete</th>
        <th>Nombre</th>
        <th>Estatus</th>
        <th>Descripción</th>
        <th>Precio</th>
        <th >Opciones</th>
@endsection
@section('tablaContenido')
@php
    $paquetes1 = $paquetes;
@endphp
@foreach ($paquetes1 as $paquete)
<tr>
    <td>{{ $paquete->id_paquete}}</td>
    <td>{{ $paquete->nombre }}</td>
    @if ($paquete->activo == 1)
    <td>Activo</td>

    @else
    <td>Inactivo</td>
    @endif

    <td>{{ $paquete->descripcion }}</td>
    <td>{{ $paquete->precio }}</td>
    <td>
        <div class="d-inline-flex p-n2 align-items-center">
            <a href="{{ route('paquete.editar',$paquete->id_paquete) }}" class="edit" ><i class="fas fa-pen" data-toggle="tooltip" title="Editar"></i></a>
            <a href="#" class="delete" data-toggle="modal" data-target="#deleteModal{{ $paquete->id_paquete }}"><i class="fas fa-trash" data-toggle="tooltip" title="Eliminar"></i></a>
            <a href="{{ route('paquete.detalle',$paquete->id_paquete) }}"  ><i class="fas fa-info-circle" data-toggle="tooltip" title="Información"></i></a>
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
    </td>
</tr>
<!-- Modal de confirmación para eliminar usuario -->
<div class="modal fade" id="deleteModal{{ $paquete->id_paquete }}" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel{{ $paquete->id_paquete }}" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel{{ $paquete->id_paquete }}">Confirmación de eliminación</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                ¿Está seguro que desea eliminar este paquete {{ $paquete->nombre }}?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <form action="{{ route('paquete.destroy', $paquete->id_paquete) }}" method="post">
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


