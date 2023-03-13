@extends('plantillas.menuCliente')
@section('titulo')
Cliente
@endsection
@section('titulobar')
<div class="contentEmpresa">
    <img src="img/logo.png" alt="Logo" class="imgLogo">
    <h1 class="empresah1">Eleganza</h1>
    <div><h1>Cliente</h1></div>
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
    <li class="write"><a href="{{ route('eventos') }}">Mis eventos</a></li>
    <li class="comments"><a href="{{route('informacion')}}">informacion</a></li>
    <li class="edit"><a href="{{ route('paquetes') }}">Paquetes</a></li>
@endsection
@section('contenido')
<div class="contPadre">
    <div class="contEvent">
        <div class="contTitEvent">
            <img src="{{ asset('img/copas-icon.png') }}" alt="">
            <h1 class="titEvent">Mis eventos</h1>
            <button class="custom-btn btn-13">Crear Evento</button>
        </div>
        <div class="eventos">
            @for($i = 1; $i < 18; $i++)
            <div class="evento">
            <h1>Evento {{ $i }}</h1>
            <button type="button" class="custom-btn btn-13" data-toggle="modal" data-target="#modalImg" style="margin: 10px;"> Añadir Imagen
            </button>
            </div>
            @endfor
        </div>
    </div>
    <div class="contDesc">
        <div class="descTitle">
            <div class="titlEvent"><h2>Evento 1</h2></div>
            <div class="iconsDesc">
                <button class="btnIcon mas">
                    <img src="img/anadir.png" alt="Agregar" class="iconoEvento">
                </button>
                <button class="btnIcon edit">
                    <img src="img/editar2.png" alt="editar" class="iconoEvento">
                </button>
                <button class="btnIcon borr">
                    <img src="img/borrar.png" alt="borrar" class="iconoEvento">
                </button>
            </div>
        </div>
        <div class="desCont">
            <label for="infor">Nombre:</label>
            <input type="text" name="nameEvnt" id="infor" placeholder="Nombre del Evento">
        </div>
        <div class="desCont">
            <label for="infor">Tipo:</label>
            <input type="text" name="typeEvnt" id="infor" placeholder="Tipo de Evento">
        </div>
        <div class="desCont">
            <label for="infor">Paquete:</label>
          <!--  <input type="text" name="paqEvnt" id="infor" placeholder="Paquetes del Evento"> -->
            <select class="selectPaq" name="paqEvnt" required placeholder="Elige una opcion">
                <option value="">Elige un paquete</option>
                <option>Boda</option>
                <option>Fiest Infantil</option>
                <option>Vacío</option>
                <option>Graduacion</option>
                <option>XV Años</option>
            </select>
        </div>
        <div class="desCont">
            <label for="infor">Fecha:</label>
            <input type="text" name="dateEvnt" id="infor" placeholder="Fecha del Evento">

        </div>
        <div class="desHora">
            <label for="infor">Hr. Inicio:</label>
            <input type="time" name="hrIniEvnt" id="infor">
            <label for="infor">Hr. Fin:</label>
            <input type="time" name="hrFinEvnt" id="infor">
        </div>
        <div class="descTotal">
            <label for="infor">Total:</label>
            <label for="infor">$100</label>
        </div>
    </div>
</div>
@endsection
