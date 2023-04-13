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
@endsection
@section('contenido')
<div class="contPadre">
    <div class="contEvent">
        <div class="contTitEvent">
            <img src="{{ asset('img/copas-icon.png') }}" alt="">
            <h1 class="titEvent">Mis eventos</h1>
            <button class="custom-btn btn-13"><a href="{{route('evento.create')}}">Crear Evento</a></button>
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
<table border="1">
    <thead>
        <th>#</th>
        <th>Cliente</th>
        <th>Total</th>
        <th>Fecha</th>
        <th>Personas</th>
    </thead>
    <tbody>
        @foreach ($eventos as $event)
        <tr>
            <td>{{$event->id_evento}}</td>
            <td>{{$event->id_usuario}}</td>
            <td>{{$event->precio}}</td>
            <td>{{$event->fecha}}</td>
            <td>{{$event->num_personas}}</td>
            <td>
                <a href="{{route('evento.edit',$event->id_evento)}}">ACTUALIZAR</a>
            </td>
            <td>
                <form action="{{route('evento.destroy', $event->id_evento)}}" method="POST">
                    @method('DELETE')
                    @csrf
                    <input type="submit" value="BORRAR">
                </form></td>
        </tr>
        
        @endforeach

    </tbody>

</table>
@endsection
