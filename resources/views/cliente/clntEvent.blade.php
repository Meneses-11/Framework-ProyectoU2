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
    <li class="write"><a href="{{ route('evento.index') }}">Mis eventos</a></li>
    <li class="comments"><a href="{{route('informacion')}}">informacion</a></li>
@endsection
@section('contenido')

    
    <div class="contTitEvent">
        <img src="{{ asset('img/copas-icon.png') }}" alt="">
        <h1 class="titEvent">Mis eventos</h1>
        <button class="custom-btn btn-13" ><a href="{{route('evento.create')}}" style="color: white !important; text-decoration: none;">Crear Evento</a></button>
    </div>


    <div class="eventos">
        @foreach ($eventos as $event)
            @if ($event->id_usuario == $usuario)
                <div class="evento">
                    <div class="imgEvento">
                        <img src="img/bodas.jpeg" alt="boda">
                    </div>
                    <div class="datosEvento">
                        <div class="infEvntTit">
                            <h1>Evento {{ $event->id_evento }}</h1>
                            <div class="iconsDesc">
                                <button class="btnIcon edit" onclick="window.location.href='{{route('evento.edit',$event->id_evento)}}'">
                                    <img src="img/editar2.png" alt="editar" class="iconoEvento">
                                </button>
                                <form action="{{route('evento.destroy', $event->id_evento)}}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="btnIcon borr">
                                        <img src="img/borrar.png" alt="borrar" class="iconoEvento">
                                    </button>                                
                                </form>
                            </div>
                        </div>
                        <div class="infEvnt">
                            <div class="texto">
                                <p>Paquete: </p>
                                @foreach ($paquetes as $nombre => $id)
                                    @if ($id == $event->id_paquete)
                                        <p>-{{$nombre}}</p>
                                    @endif
                                @endforeach
                            </div>
                            <div class="texto">  
                                <p>Servicio:</p>
                                @if (empty($event->id_servicio))
                                    <p>-Ninguno</p>
                                @else
                                    @foreach ($servicios as $nombre => $id)
                                        @if ($id == $event->id_servicio)
                                            <p>-{{$nombre}}</p>
                                        @endif
                                    @endforeach
                                @endif
                            </div>
                            <div class="texto">
                                <p>Personas:</p>
                                <p>{{$event->num_personas}}</p>
                            </div>
                        </div>
                        <div class="infEvnt">
                            <div class="texto">
                                <p>Fecha:</p>
                                <p>{{$event->fecha}}</p>
                            </div>
                            <div class="texto">
                                <p>Hora de Inicio:</p>
                                <p>{{$event->hora_inicio}}</p>
                            </div>
                            <div class="texto">
                                <p>Hora Finalizacion:</p>
                                <p>{{$event->hora_fin}}</p>
                            </div>
                        </div>
                        <div class="infEvntTit">
                            <h2> Total: {{$event->precio}} </h2>
                            <button type="button" class="custom-btn btn-13" data-toggle="modal" data-target="#modalImg" style="margin: 10px;"> Añadir Imagen </button>
                        </div>
                    </div>

                </div>
            @endif
        @endforeach
    </div>
    
    <!--
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
    -->
@endsection
