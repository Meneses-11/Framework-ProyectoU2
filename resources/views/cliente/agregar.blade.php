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


<form action="{{route('evento.store')}}" method="POST">
        @csrf
    <div class="prinAgregar">
        <div class="contDesc">
            <div class="titleGuardar">
                <h1>Nuevo Evento</h1>
            </div>
            <div class="formu1">
                <div class="desCont">
                    <label for="infor">Paquete:</label>
                    <!--  <input type="text" name="paqEvnt" id="infor" placeholder="Paquetes del Evento"> -->
                    <select class="selectPaq" name="idPaquete" required placeholder="Elige una opcion">
                        <option value="">Elige un Paquete</option>
                        @foreach ($paquetes as $nombre => $id)
                            <option value="{{ $id }}">{{ $nombre }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="desCont">
                    <label for="infor">Servicio:</label>
                    <!--  <input type="text" name="paqEvnt" id="infor" placeholder="Paquetes del Evento"> -->
                    <select class="selectPaq" name="idServicio" required placeholder="Elige una opcion">
                        <option value="">Elige un Servicio</option>
                        <option value="">Ninguno</option>
                        @foreach ($servicios as $nombre => $id)
                            <option value="{{ $id }}">{{ $nombre }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="desCont">
                    <label for="infor">N. Personas:</label>
                    <input type="number" name="numPersonas" id="infor" placeholder="Numero de Personas">
                </div>
                <div class="desCont">
                    <label for="infor">Fecha:</label>
                    <input type="date" name="fecha" id="infor" placeholder="Fecha de Evento">
                </div>
                <div class="desHora">
                    <label for="infor">Hr. Inicio:</label>
                    <input type="time" name="hrIni" id="infor">
                    <label for="infor">Hr. Fin:</label>
                    <input type="time" name="hrFin" id="infor">
                </div>
                <div class="desCont">
                    <label for="infor">Descripción:</label>
                    <input type="text" name="descripcion" id="infor" placeholder="Descripción del Evento">
                </div>
                <div class="desCont">
                    <label for="infor">Precio:</label>
                    <input type="number" name="precio" id="infor" placeholder="Precio del Evento">
                </div>
            </div>
            <div class="btnGuardar">
                <input class="custom-btn btn-13" type="submit" value="SEND">
                <button type="button" class="btn btn-danger btn-block mt-2" onclick="window.location.href='{{ route('evento.index') }}'">Cancelar</button>
            </div>
        </div>
    </div>
</form>


@endsection
