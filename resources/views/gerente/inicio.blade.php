@extends('plantillas.menuGerente')

@section('titulo')
Usuarios
@endsection
@section('titulobar')
Admin Gerente
@endsection
@section('menu')
    <li class="dashboard"><a href="/gerente/usuarios">Administrar Usuarios</a></li>
    <li class="navItem"><a href="">Lista de Paquetes</a></li>
    <li class="write"><a href="#">Lista de servicios</a></li>
@endsection

@section('contenido')

@extends('plantillas.tabla')
@section('tituloTabla')
Lista de Usuarios
@endsection
@section('tablaContenido')
@for ($i=1; $i <=8; $i++)

<tr>
    <td>Cliente{{ $i }}</td>
    <td>Cliente{{ $i.'@gmail.com'}}</td>
    <td>961333567{{ $i }}</td>
    <td>
      <a href="#editEmployeeModal" class="btn btn-info" data-toggle="modal">Editar</a>
      <a href="#deleteEmployeeModal" class="btn btn-warning" data-toggle="modal">Eliminar</a>
    </td>
  </tr>

@endfor
@endsection
@endsection



