@extends('plantillas.tabla')

@section('titulo')
Usuarios
@endsection

@section('tituloTabla')
Lista de Usuarios
@endsection
@section('tablaContenido')
@for ($i=1; $i <=4; $i++)

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


