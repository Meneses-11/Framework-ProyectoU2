@extends('plantillas.menuGerente')

@section('estilos')
    <link rel="stylesheet" href="/css/styleMenuClnt.css">
@endsection

@section('titulo')
    Cliente
@endsection

@section('links')
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&family=Space+Grotesk&display=swap" rel="stylesheet">
@endsection

@section('titulobar')
Cliente
@endsection
@section('opcionesIzquierda')
    <li class="nav-item"><a class="nav-link active" aria-current="page" href="{{route('paquetes')}}">Paquetes</a></li>
@endsection
@section('opcionesDerecha')
    <li><a class="dropdown-item" href="{{ route('cerrar_sesion') }}">Cerrar Sesión</a></li>
@endsection

@section('contenido')
    @guest
      <h1>No eres Cliente</h1>  
    @endguest
    @auth
        
    <div class="contPrinc">

        <div class="contTitEvent">
            <img src="{{ asset('img/copas-icon.png') }}" alt="">
            <h1 class="titEvent">Mis eventos</h1>
            <button class="custom-btn btn-13" ><a href="{{route('evento.create')}}" style="color: white !important; text-decoration: none;">Crear Evento</a></button>
        </div>


        <div class="eventos">
            @foreach ($eventos as $event)
                    <div class="evento">
                        <div class="imgEvento">
                            <img src="{{ $event->paquete->nombre_foto }}"g alt="boda">
                        </div>
                        <div class="datosEvento">
                            <div class="infEvntTit">
                                <h1>Evento {{ $event->id_evento }}</h1>

                                @if ($event->confirmacion == 1)
                                    <div class="titEventConfirm">
                                        <img src="img/cheque.png" alt="confirmado" class="iconoEvento">
                                        <h4>Confirmado</h4>
                                    </div>
                                @else
                                    <div class="titEventConfirm">
                                        <img src="img/btn-x.png" alt="sin confirmar" class="iconoEvento">
                                        <h4>Sin Confirmar</h4>
                                    </div>
                                    <div class="iconsDesc">
                                        <button class="btnIcon edit" onclick="window.location.href='{{route('evento.edit',$event->id_evento)}}'">
                                            <img src="img/editar2.png" alt="editar" class="iconoEvento">
                                        </button>
                                        <button class="btnIcon borr" data-toggle="modal" data-target="#modalDelete{{$event->id_evento}}">
                                            <img src="img/borrar.png" alt="borrar" class="iconoEvento">
                                        </button>
                                    </div>

                                    <!-- Modal -->
                                    <div class="modal fade" id="modalDelete{{$event->id_evento}}" tabindex="-1" role="dialog" aria-labelledby="modalDeleteLabel{{$event->id_evento}}" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5  class="modal-title fs-5" id="modalDeleteLabel{{$event->id_evento}}" style="color: black !important;">Eliminar Evento</h5>
                                                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body" style="color: black !important;">
                                                    ¿Esta seguro de eliminar el evento {{$event->id_evento}}?
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                                    <form action="{{ route('evento.destroy', $event->id_evento) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <input type="hidden" name="confirmacion" value="1">
                                                        <button type="submit" class="btn btn-primary">Aceptar</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                @endif
                            </div>
                            <div class="infEvnt">
                                <div>
                                    <form action="{{ route('evento.show',$event->id_evento) }}" method="GET">
                                        <button type="submit" class="btn btn-primary">Ver Contrato</button>
                                    </form>
                                </div>
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
                                    @if (($event -> servicios() -> pluck('nombre'))!== null)
                                        @foreach ($event -> servicios() -> pluck('nombre') as $evnt)
                                            <p style="font-size: 14px">-{{ $evnt }}</p>
                                        @endforeach
                                    @else
                                        <p>-Ninguno</p>
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
                                @if ($event->confirmacion == 1)
                                    <button type="button" class="custom-btn btn-13" data-toggle="modal" data-target="#modalImg" style="margin: 10px;"> Añadir Imagen </button>
                                @else
                                    <button class="custom-btn btn-13" data-toggle="modal" data-target="#modalConfirm{{$event->id_evento}}">Confirmar</button>


                                    <!-- Modal -->
                                    <div class="modal fade" id="modalConfirm{{$event->id_evento}}" tabindex="-1" role="dialog" aria-labelledby="modalConfirmLabel{{$event->id_evento}}" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title fs-5" id="modalConfirmLabel{{$event->id_evento}}" style="color: black !important;">Confirmacion de Evento</h5>
                                                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body" style="color: black !important;">
                                                    ¿Desea confirmar el evento {{$event->id_evento}}?
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                                    <form action="{{ route('evento.confirmar', $event->id_evento) }}" method="POST">
                                                        @csrf
                                                        @method('PUT')
                                                        <input type="hidden" name="confirmacion" value="1">
                                                        <button type="submit" class="btn btn-primary">Aceptar</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                @endif
                            </div>
                        </div>

                    </div>

            @endforeach
        </div>
    </div>
    
    @endauth
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
