@extends('plantillas.menuGerente')

@section('titulo')
Usuarios
@endsection

@section('titulobar')
Admin Gerente Usuarios
@endsection
@section('estilos')
<link rel="stylesheet" href="/css/styleTabla.css">
@endsection

@section('opcionesIzquierda')
<li class="nav-item"><a class="nav-link active" aria-current="page" href="{{ route('usuario.inicio') }}">Administrar Usuarios</a></li>
<li class="nav-item"><a class="nav-link active" aria-current="page" href="{{ route('paquete.index') }}">Administrar Paquetes</a></li>
<li class="nav-item"><a class="nav-link active" aria-current="page" href="{{ route('servicio.inicio') }}">Administrar Servicios</a></li>
<li class="nav-item"><a class="nav-link active" aria-current="page" href="{{ route('evento.mostrar') }}">Administrar Eventos</a></li>
@endsection
@section('opcionesDerecha')
<li><a class="dropdown-item" href="{{ route('cerrar_sesion') }}">Cerrar Sesión</a></li>
@endsection
@section('contenido')

@extends('plantillas.tabla')
@section('tituloTabla')
<h2 style="padding-left: 18px; font-size: 1rem !important; font-weight: bold;">Lista de Clientes</h2>
@endsection
@section('btnTabla')
<a style="margin-right: 2%; text-align: center !important; color: rgb(33,37,41) !important; background: #ffffff;" href="{{ route('usuario.crear') }}" class="btn btn-success"><i class="fas fa-plus-circle"></i><span>Añadir Nuevo Usuario</span></a>
@endsection
@section('columnas')
        <th>ID</th>
        <th>Eventos</th>
        <th>Activos</th>
        <th>Rol</th>
        <th>Nombre</th>
        <th>Apellido</th>
        <th>Correo</th>
        <th>Telefono</th>
        <th>Opciones</th>

@endsection
@section('tablaContenido')
@php
    $clientest1 = $clientes->where('rol','Cliente');
@endphp
@foreach ($clientest1 as $cliente)
<tr>
    <td>{{ $cliente->id_usuario}}</td>
    <td>{{ $cliente->eventos()->count() }}</td>
    <td>{{ $cliente->eventos()->where('confirmacion',1)->pluck('id_evento')->count() }}</td>
    <td>{{ $cliente->rol }}</td>
    <td>{{ $cliente->nombre }}</td>
    <td>{{ $cliente->apellido}}</td>
    <td>{{ $cliente->email }}</td>
    <td>{{ $cliente->telefono}}</td>
    <td>
        <div class="d-inline-flex p-n2 align-items-center">
            <a href="{{ route('usuario.editar',$cliente->id_usuario) }}" class="edit" ><i class="fas fa-pen" data-toggle="tooltip" title="Editar"></i></a>
            <a href="#" class="delete" data-toggle="modal" data-target="#deleteModal{{ $cliente->id_usuario }}"><i class="fas fa-trash" data-toggle="tooltip" title="Eliminar"></i></a>
            {{-- <a href="{{ route('usuario.detalle',$cliente->id_usuario) }}"  ><i class="fas fa-info-circle" data-toggle="tooltip" title="Información"></i></a> --}}
        </div>
    </td>
</tr>

<!-- Modal de confirmación para eliminar usuario -->
<div class="modal fade" id="deleteModal{{ $cliente->id_usuario }}" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel{{ $cliente->id_usuario }}" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="deleteModalLabel{{ $cliente->id_usuario }}">Confirmación de eliminación</h5>
          <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          ¿Está seguro que desea eliminar al usuario {{ $cliente->nombre }} {{ $cliente->apellido }}?
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
          <form action="{{ route('usuario.destruir', $cliente->id_usuario) }}" method="post">
            @method('DELETE')
            @csrf
            <button type="submit" class="btn btn-danger">Eliminar</button>
          </form>
        </div>
      </div>
    </div>
  </div>
@endforeach


@php
    $clientest2 = $clientes->where('rol','Empleado');
@endphp
@foreach ($clientest2 as $cliente)
<tr>

    <td>{{ $cliente->id_usuario}}</td>
    <td>{{ $cliente->eventos()->count() }}</td>
    <td>{{ $cliente->eventos()->where('confirmacion',1)->pluck('id_evento')->count() }}</td>
    <td>{{ $cliente->rol }}</td>
    <td>{{ $cliente->nombre }}</td>
    <td>{{ $cliente->apellido}}</td>
    <td>{{ $cliente->email }}</td>
    <td>{{ $cliente->telefono}}</td>
    <td>
        <div class="d-inline-flex p-n2 align-items-center">
            <a href="{{ route('usuario.editar',$cliente->id_usuario) }}" class="edit" ><i class="fas fa-pen" data-toggle="tooltip" title="Editar"></i></a>
            <a href="#" class="delete" data-toggle="modal" data-target="#deleteModal{{ $cliente->id_usuario }}"><i class="fas fa-trash" data-toggle="tooltip" title="Eliminar"></i></a>
        </div>
    </td>
</tr>
<!-- Modal de confirmación para eliminar usuario -->
<div class="modal fade" id="deleteModal{{ $cliente->id_usuario }}" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel{{ $cliente->id_usuario }}" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="deleteModalLabel{{ $cliente->id_usuario }}">Confirmación de eliminación</h5>
          <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          ¿Está seguro que desea eliminar al usuario {{ $cliente->nombre }} {{ $cliente->apellido }}?
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
          <form action="{{ route('usuario.destruir', $cliente->id_usuario) }}" method="post">
            @method('DELETE')
            @csrf
            <button type="submit" class="btn btn-danger">Eliminar</button>
          </form>
        </div>
      </div>
    </div>
  </div>
@endforeach

@php
    $clientest2 = $clientes->where('rol','Gerente');
@endphp
@foreach ($clientest2 as $cliente)
<tr>

    <td>{{ $cliente->id_usuario}}</td>
    <td>{{ $cliente->eventos()->count() }}</td>
    <td>{{ $cliente->eventos()->where('confirmacion',1)->pluck('id_evento')->count() }}</td>
    <td>{{ $cliente->rol }}</td>
    <td>{{ $cliente->nombre }}</td>
    <td>{{ $cliente->apellido}}</td>
    <td>{{ $cliente->email }}</td>
    <td>{{ $cliente->telefono}}</td>
    <td>
        <div class="d-inline-flex p-n2 align-items-center">
            <a href="{{ route('usuario.editar',$cliente->id_usuario) }}" class="edit" ><i class="fas fa-pen" data-toggle="tooltip" title="Editar"></i></a>
            <a href="#" class="delete" data-toggle="modal" data-target="#deleteModal{{ $cliente->id_usuario }}"><i class="fas fa-trash" data-toggle="tooltip" title="Eliminar"></i></a>
        </div>
    </td>
</tr>
<!-- Modal de confirmación para eliminar usuario -->
<div class="modal fade" id="deleteModal{{ $cliente->id_usuario }}" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel{{ $cliente->id_usuario }}" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="deleteModalLabel{{ $cliente->id_usuario }}">Confirmación de eliminación</h5>
          <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          ¿Está seguro que desea eliminar al usuario {{ $cliente->nombre }} {{ $cliente->apellido }}?
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
          <form action="{{ route('usuario.destruir', $cliente->id_usuario) }}" method="post">
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



