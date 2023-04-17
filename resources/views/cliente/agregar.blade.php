@extends('plantillas.menuGerente')
@section('estilos')
    <link rel="stylesheet" href="/css/styleBars.css">
    <link rel="stylesheet" href="/css/styleMenuClnt.css">
    <link rel="stylesheet" href="/css/stylePaquetes.css">
@endsection
@section('titulo')
    Nuevo Evento
@endsection
@section('links')
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&family=Space+Grotesk&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
@endsection
@section('titulobar')
    <div class="contentEmpresa ">
        <img src="{{ asset('img/logo.png') }}" alt="Logo" class="imgLogo">
        <div style=" font-weight: bold;">Cliente</div>
    </div>
@endsection
@section('opcionesIzquierda')
    <li class="nav-item active" style="color: white;">Mis eventos</li>
@endsection
@section('opcionesDerecha')
    <li><a class="dropdown-item" href="{{ route('login') }}">Cerrar Sesión</a></li>
@endsection

@section('contenido')

    <div class="contPrinc">
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
                            <select id="paqueteSelect" class="selectPaq" name="idPaquete" required>
                                <option value="">Seleccione un paquete</option>
                                @foreach ($paquetes as $paq)
                                    <option value="{{ $paq->id_paquete }}">{{ $paq->nombre }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="desCont">
                            <label for="infor">Servicio:</label>
                            <select id="servicioSelect" class="selectPaq" name="idServicio">
                                <option value="">Ninguno</option>
                                @foreach ($servicios as $servi)
                                    <option value="{{ $servi->id_servicio }}">{{ $servi->nombre }}</option>
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
                            <label for="infor" name="preci" id="preci"></label>
                            <input type="hidden" name="precio" id="preciTot" value="">
                        </div>

                        <script>
                            // Obtener los select
                            var paqueteSelect = document.getElementsByName("idPaquete")[0];
                            var servicioSelect = document.getElementsByName("idServicio")[0];

                            // Obtener los valores de paquetes y servicios (el método pluck genera un objeto de selección de laravel)
                            var paquetes = {!! json_encode($paquetes->toArray()) !!};  //por eso lo convertimos a un formato que pueda reconocer JavaScript
                            var servicios = {!! json_encode($servicios->toArray()) !!};

                            // Asignar un evento a los select para detectar cambios
                            paqueteSelect.addEventListener("change", actualizarResultado);
                            servicioSelect.addEventListener("change", actualizarResultado);

                            // Función que actualiza el contenido del label con los valores seleccionados
                            function actualizarResultado() {
                                var paqueteSeleccionado = paqueteSelect.value;  //obtenemos el valor del paquete
                                var servicioSeleccionado = servicioSelect.value;//obtenemos el valor del servicio
                                var precPaq = 0;
                                var precServ = 0;

                                paquetes.forEach(function(paquet){ //recorremos los paquetes
                                    if(paquet['id_paquete'] == paqueteSeleccionado){ //comparamos con el id del escogido
                                        precPaq = paquet['precio'];
                                    }
                                });
                                servicios.forEach(function(servi){
                                    if(servi['id_servicio'] == servicioSeleccionado){
                                        precServ = servi['precio'];
                                    }
                                });
                                var tot = precPaq + precServ;
                                document.getElementById("preci").innerHTML = tot;
                                document.getElementById("preciTot").value = tot;

                            }
                        </script>
                    </div>
                    <div class="btnGuardar">
                        <input class="custom-btn btn-13" type="submit" value="SEND">
                        <button type="button" class="btn btn-danger btn-block mt-2" onclick="window.location.href='{{ route('evento.index') }}'">Cancelar</button>
                    </div>
                </div>
            </div>
        </form>
    </div>

@endsection
