@extends('plantillas.menuCliente')

@section('titulo')
Usuarios
@endsection
@section('menu')
    <li class="dashboard"><a href="admindashboard">Dashboard</a></li>
    <li class="edit"><a href="#">Edit Website</a></li>
    <li class="write"><a href="#">Write news</a></li>
    <li class="comments"><a href="#">Ads</a></li>
    <li class="users"><a href="#">Manage Users</a></li>
@endsection

@section('contenido')

@extends('plantillas.tabla')
@section('tituloTabla')
Lista de Usuarios
@endsection
@section('tablaContenido')
@for ($i=1; $i <=7; $i++)

<tr>
    <td>Cliente{{ $i }}</td>
    <td>Cliente{{ $i.'@gmail.com'}}</td>
    <td>961333567{{ $i }}</td>
    <td>
      <a href="#editEmployeeModal" class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
      <a href="#deleteEmployeeModal" class="delete" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
    </td>
  </tr>

@endfor
@endsection
@endsection



