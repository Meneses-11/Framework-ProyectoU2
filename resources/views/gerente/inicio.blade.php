@extends('plantillas.menuGerente')

@section('titulo')
Usuarios
@endsection
@section('titulobar')
<div class="contentEmpresa">
    <img src="{{ asset('img/logo.png') }}" class="imgLogo">
    <h1 >Eleganza</h1>
    <div>Admin Gerente</div>
</div>
@endsection
@section('menu')
    <li class="dashboard"><a href="{{ route('usuarios.index') }}">Administrar Usuarios</a></li>
    <li class="dashboard"><a href="">Lista de Paquetes</a></li>
    <li class="dashboard"><a href="">Lista de servicios</a></li>
@endsection

@section('contenido')
@extends('plantillas.tabla')
@section('tituloTabla1')
<h2>Lista de Clientes</h2>
@endsection
@section('columnast1')
        <th>ID</th>
        <th>Nombre</th>
        <th>Apellido</th>
        <th>Correo</th>
        <th>Telefono</th>
        <th>Direccion</th>

@endsection
@section('tablaContenidot1')
@php
    $clientest1 = $clientes->where('rol','Cliente');
@endphp
@foreach ($clientest1 as $cliente)
<tr>
    <td>
        <span class="custom-checkbox">
            <input type="checkbox" id="checkbox1" name="options[]" value="1">
            <label for="checkbox1"></label>
        </span>
    </td>
    <td>{{ $cliente->id_usuario}}</td>
    <td>{{ $cliente->nombre }}</td>
    <td>{{ $cliente->apellido}}</td>
    <td>{{ $cliente->email }}</td>
    <td>{{ $cliente->telefono}}</td>
    <td>
        <div class="d-inline-flex p-n2 align-items-center">
            <a href="{{ route('usuarios.editar',$cliente->id_usuario) }}" class="edit" ><i class="fas fa-pen" data-toggle="tooltip" title="Editar"></i></a>

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
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                ¿Está seguro que desea eliminar al usuario {{ $cliente->nombre }} {{ $cliente->apellido }}?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <form action="{{ route('usuarios.destroy', $cliente->id_usuario) }}" method="post">
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
    <td>
        <span class="custom-checkbox">
            <input type="checkbox" id="checkbox1" name="options[]" value="1">
            <label for="checkbox1"></label>
        </span>
    </td>
    <td>{{ $cliente->id_usuario}}</td>
    <td>{{ $cliente->nombre }}</td>
    <td>{{ $cliente->apellido}}</td>
    <td>{{ $cliente->nombre_usuario}}</td>
    <td>{{ $cliente->contraseña }}</td>
    <td>{{ $cliente->fecha_nacimiento }}</td>
    <td>{{ $cliente->direccion }}</td>
    <td>{{ $cliente->email }}</td>
    <td>{{ $cliente->telefono}}</td>
    <td>
        <div class="d-inline-flex p-n2 align-items-center">
            <a href="{{ route('usuarios.index') }}" class="edit" data-toggle="modal"><i class="fas fa-pen" data-toggle="tooltip" title="Editar"></i></a>
            <a href="#eliminarModal" class="delete" data-toggle="modal"><i class="fas fa-trash" data-toggle="tooltip" title="Eliminar"></i></a>
        </div>
    </td>
</tr>

@endforeach
@endsection
@section('lbl1')
<div class="clearfix elemento">
    <div class="hint-text">Mostrando <b>{{ $clientes->where('rol','Cliente')->count() }}</b> registros</div>
</div>
@endsection

@section('tituloTabla2')
<h2>Lista de Empleados</h2>
@endsection
@section('columnast2')
        <th>ID</th>
        <th>Nombre</th>
        <th>Apellido</th>
        <th>Nombre de usuario</th>
        <th>Contraseña</th>
        <th>Fecha de nacimiento</th>
        <th>Direccion</th>
        <th>Correo</th>
        <th>Telefono</th>
@endsection
@section('tablaContenidot2')
@php
    $clientest2 = $clientes->where('rol','Empleado');
@endphp
@foreach ($clientest2 as $cliente)
<tr>
    <td>
        <span class="custom-checkbox">
            <input type="checkbox" id="checkbox1" name="options[]" value="1">
            <label for="checkbox1"></label>
        </span>
    </td>
    <td>{{ $cliente->id_usuario}}</td>
    <td>{{ $cliente->nombre }}</td>
    <td>{{ $cliente->apellido}}</td>
    <td>{{ $cliente->nombre_usuario}}</td>
    <td>{{ $cliente->contraseña }}</td>
    <td>{{ $cliente->fecha_nacimiento }}</td>
    <td>{{ $cliente->direccion }}</td>
    <td>{{ $cliente->email }}</td>
    <td>{{ $cliente->telefono}}</td>
    <td>
        <div class="d-inline-flex p-n2 align-items-center">
            <a href="{{ route('usuarios.index') }}" class="edit" data-toggle="modal"><i class="fas fa-pen" data-toggle="tooltip" title="Editar"></i></a>
            <a href="#eliminarModal" class="delete" data-toggle="modal"><i class="fas fa-trash" data-toggle="tooltip" title="Eliminar"></i></a>
        </div>
    </td>
</tr>

@endforeach

@endsection


@section('lbl2')
<div class="clearfix elemento">
    <div class="hint-text">Mostrando <b>{{ $clientes->where('rol','Empleado')->count() }}</b> registros</div>
</div>

@endsection
@section('tituloTabla3')
<h2>Lista de Gerentes</h2>
@endsection
@section('columnast3')
        <th>ID</th>
        <th>Nombre</th>
        <th>Apellido</th>
        <th>Correo</th>
        <th>Telefono</th>
@endsection
@section('tablaContenidot3')
@php
    $clientest2 = $clientes->where('rol','Gerente');
@endphp
@foreach ($clientest2 as $cliente)
<tr>
    <td>
        <span class="custom-checkbox">
            <input type="checkbox" id="checkbox1" name="options[]" value="1">
            <label for="checkbox1"></label>
        </span>
    </td>
    <td>{{ $cliente->id_usuario}}</td>
    <td>{{ $cliente->nombre }}</td>
    <td>{{ $cliente->apellido}}</td>
    <td>{{ $cliente->email }}</td>
    <td>{{ $cliente->telefono}}</td>
    <td>
        <div class="d-inline-flex p-n2 align-items-center">
            <a href="{{ route('usuarios.index') }}" class="edit" data-toggle="modal"><i class="fas fa-pen" data-toggle="tooltip" title="Editar"></i></a>
            <a href="#eliminarModal" class="delete" data-toggle="modal"><i class="fas fa-trash" data-toggle="tooltip" title="Eliminar"></i></a>
        </div>
    </td>
</tr>

@endforeach

@endsection


@section('lbl2')
<div class="clearfix elemento">
    <div class="hint-text">Mostrando <b>{{ $clientes->where('rol','Gerente')->count() }}</b> registros</div>
</div>

@endsection
@endsection



