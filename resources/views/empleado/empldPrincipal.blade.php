@extends('plantillas.menuCliente')
@section('titulo')
Empleado
@endsection
@section('titulobar')
<img src="img/logo.png" alt="Logo" class="imgLogo">
<h1>Empleado</h1>
@endsection
@section('menu')
    <li class="edit"><a href="{{route('paquetes')}}">------</a></li>
@endsection
@contend('contenido')

@endcontend