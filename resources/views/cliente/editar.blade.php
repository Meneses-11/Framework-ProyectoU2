@extends('plantillas.menuCliente')
@section('titulo')
NewEvent
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
@section('contenido')

<div class="contDesc">
    <form action="{{route('evento.update', $evento->id_evento)}}" method="POST">
        @method('PUT')
        @csrf
        
        <div class="desCont">
            <label for="infor">Id Usuario:</label>
            <select class="selectPaq" name="idUsuario" required placeholder="Elige una opcion">
                <option value="{{$evento->id_usuario}}">{{ $evento->id_usuario }}</option>
            </select>
        </div>
        <div class="desCont">
            <label for="infor">Id Paquete:</label>
            <!--  <input type="text" name="paqEvnt" id="infor" placeholder="Paquetes del Evento"> -->
            <select class="selectPaq" name="idPaquete" required placeholder="Elige una opcion">
                <option value="{{$evento->id_paquete}}">{{ $evento->id_paquete }}</option>
                <option>1</option>
                <option>2</option>
                <option>3</option>
                <option>4</option>
                <option>5</option>
            </select>
        </div>
        <div class="desCont">
            <label for="infor">Id Servicio:</label>
            <!--  <input type="text" name="paqEvnt" id="infor" placeholder="Paquetes del Evento"> -->
            <select class="selectPaq" name="idServicio" required placeholder="Elige una opcion">
                <option value="{{ $evento->id_servicio }}">{{ $evento->id_servicio }}</option>
                <option>1</option>
                <option>2</option>
                <option>3</option>
                <option>4</option>
                <option>5</option>
            </select>
        </div>
        <div class="desCont">
            <label for="infor">Precio:</label>
            <input type="number" name="precio" id="infor" value="{{ $evento->precio }}">
        </div>
        <div class="desCont">
            <label for="infor">Fecha:</label>
            <input type="date" name="fecha" id="infor" value="{{ $evento->fecha }}">
        </div>
        <div class="desCont">
            <label for="infor">Descripción:</label>
            <input type="text" name="descripcion" id="infor" value="{{ $evento->descripcion }}">
        </div>
        <div class="desHora">
            <label for="infor">Hr. Inicio:</label>
            <input type="time" name="hrIni" id="infor" value="{{ $evento->hora_inicio }}">
            <label for="infor">Hr. Fin:</label>
            <input type="time" name="hrFin" id="infor" value="{{ $evento->hora_fin }}">
        </div>
        <div class="desCont">
            <label for="infor">N. Personas:</label>
            <input type="number" name="numPersonas" id="infor" value="{{ $evento->num_personas }}">
        </div>
        <div>
            <input class="custom-btn btn-13" type="submit" value="Actualizar">
            <input class="custom-btn btn-13" type="submit" value="Cancelar">
        </div>
    
    </form>

</div>

@endsection