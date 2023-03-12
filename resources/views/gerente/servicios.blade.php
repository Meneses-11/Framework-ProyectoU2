@extends('plantillas.menuGerente')

@section('titulo')
Servicios
@endsection
@section('titulobar')
Admin Gerente
@endsection
@section('menu')
    <li class="dashboard"><a href="{{ route('listaUsuarios') }}">Administrar Usuarios</a></li>
    <li class="dashboard"><a href="{{ route('listaPaquetes') }}">Lista de Paquetes</a></li>
    <li class="dashboard"><a href="{{ route('listaServicios') }}">Lista de servicios</a></li>
@endsection

@section('contenido')

@extends('plantillas.tabla')
@section('tituloTabla')
<h2>Lista de Servicios</h2>
@endsection
@section('columnas')
        <th>ID servicio</th>
        <th>Nombre</th>
        <th>Descripción</th>
        <th>Precio</th>
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
    <td>{{ $i }}</td>
    <td>Noambre{{ $i}}</td>
    <td>Descripción{{ $i }}</td>
    <td>${{ $i }}</td>
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



