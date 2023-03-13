@extends('plantillas.menuGerente')

@section('titulo')
Usuarios
@endsection
@section('titulobar')
<div class="contentEmpresa">
    <img src="img/logo.png"class="imgLogo">
    <h1 >Eleganza</h1>
    <div>Admin Gerente</div>
</div>
@endsection
@section('menu')
    <li class="dashboard"><a href="{{ route('listaUsuarios') }}">Administrar Usuarios</a></li>
    <li class="dashboard"><a href="{{ route('listaPaquetes') }}">Lista de Paquetes</a></li>
    <li class="dashboard"><a href="{{ route('listaServicios') }}">Lista de servicios</a></li>
@endsection

@section('contenido')

@extends('plantillas.tabla')
@section('tituloTabla')
<h2>Lista de Usuarios</h2>
@endsection
@section('columnas')
        <th>Nombre</th>
        <th>Correo</th>
        <th>Telefono</th>
        <th>Dirección</th>
        <th>Fecha de Nacimiento</th>
        <th>Acciones</th>
@endsection
@section('tablaContenido')
@for ($i=1; $i <=5; $i++)

<tr>
    <td>
        <span class="custom-checkbox">
            <input type="checkbox" id="checkbox1" name="options[]" value="1">
            <label for="checkbox1"></label>
        </span>
    </td>
    <td>Cliente{{ $i }}</td>
    <td>Cliente{{ $i.'@gmail.com'}}</td>
    <td>961333567{{ $i }}</td>
    <td>Dirección{{ $i }}</td>
    <td>Fecha de nacimiento{{ $i }}</td>
    <td>
        <div class="d-inline-flex p-n2 align-items-center">
            <a href="#editEmployeeModal" class="edit" data-toggle="modal"><i class="fas fa-pen" data-toggle="tooltip" title="Editar"></i></a>
            <a href="#deleteEmployeeModal" class="delete" data-toggle="modal"><i class="fas fa-trash" data-toggle="tooltip" title="Eliminar"></i></a>
        </div>
    </td>
</tr>

@endfor
@endsection
@endsection



