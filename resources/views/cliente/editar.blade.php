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
<form action="{{route('evento.update', $evento->id_evento)}}" method="POST">
        @method('PUT')
        @csrf
    <div class="prinAgregar">
        <div class="contDesc">
            <div class="titleGuardar">
                <h1>Editar Evento {{ $evento->id_evento }}</h1>
            </div>
            <div class="formu1">
                <div class="desCont">
                    <label for="infor">Paquete:</label>
                    <!--  <input type="text" name="paqEvnt" id="infor" placeholder="Paquetes del Evento"> -->
                    <select class="selectPaq" name="idPaquete" required placeholder="Elige una opcion">
                        @foreach ($paquetes as $nombre => $id)
                            <option value="{{ $id }}" @if ($evento->id_paquete == $id) selected @endif>{{ $nombre }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="desCont">
                    <label for="infor">Servicio:</label>
                    <!--  <input type="text" name="paqEvnt" id="infor" placeholder="Paquetes del Evento"> -->
                    <select class="selectPaq" name="idServicio" required placeholder="Elige una opcion">
                        @if (empty($evento->id_servicio))
                            <option value="">Ninguno</option>
                            @foreach ($servicios as $nombre => $id)
                                <option value="{{ $id }}">{{ $nombre }}</option>
                            @endforeach
                        @else
                            @foreach ($servicios as $nombre => $id)
                                <option value="{{ $id }}" @if ($evento->id_servicio == $id) selected @endif>{{ $nombre }}</option>
                            @endforeach
                            <option value="">Ninguno</option>
                        @endif
                    </select>
                </div>
                <div class="desCont">
                    <label for="infor">N. Personas:</label>
                    <input type="number" name="numPersonas" id="infor" value="{{ $evento->num_personas }}">
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
                    <label for="infor">Precio:</label>
                    <input type="number" name="precio" id="infor" value="{{ $evento->precio }}">
                </div>
                
            </div>
            <div class="btnGuardar">
                <input class="custom-btn btn-13" type="submit" value="Actualizar">
                <input class="btn btn-danger" type="button" value="Cancelar" onclick="window.location.href='{{ route('evento.index') }}'">
            </div>
        </div>
    </div>
</form>
@endsection