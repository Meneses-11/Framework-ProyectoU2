@extends('plantillas.menuCliente')
@section('contenido')
<h1>Informacion</h1>
@endsection
@section('titulobar')
<div class="contentEmpresa">
    <img src="img/logo.png" alt="Logo" class="imgLogo">
    <h1 class="empresah1">Eleganza</h1>
    <div><h1>Empleado</h1></div>
</div>
<div>
    <ul class="utilities">
      <br>
      <li class="logout warn" style="color: red;"><a href="{{ route('login') }}">Cerrar Sesion</a></li>
    </ul>
</div>
@endsection
@section('menu')
    <li class="edit"><a href="{{route('paquetes')}}">Paquetes</a></li>
    <li class="write"><a href="{{ route('evento.index') }}">Mis eventos</a></li>
    <li class="comments"><a href="{{route('informacion')}}">informacion</a></li>
@endsection
