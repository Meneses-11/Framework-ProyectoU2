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
    @can('viewAny', App\Models\Evento::class)
        <li class="nav-item"><a class="nav-link active" aria-current="page" href="{{route('paquetes')}}">Paquetes</a></li>
    @endcan
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
            @can('viewAny', App\Models\Evento::class)
                <button class="custom-btn btn-14" ><a href="{{route('evento.create')}}" style="color: white !important; text-decoration: none;">Crear Evento</a></button>
            @else
                <button class="custom-btn btn-14" ><a href="{{route('usuario.inicio')}}" style="color: white !important; text-decoration: none;">Regresar</a></button>
            @endcan

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
                                @can('update', $event)
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
                                @else
                                    <div class="titEventConfirm">
                                        <img src="img/cheque.png" alt="confirmado" class="iconoEvento">
                                        <h4>Confirmado</h4>
                                    </div>
                                    
                                @endcan

                            </div>
                            <div class="infEvnt">
                                @can('confirm', $event)
                                    <div>
                                        <form action="{{ route('evento.show',$event->id_evento) }}" method="GET">
                                            <button type="submit" class="custom-btn btn-14">Ver Contrato</button>
                                        </form>
                                    </div>
                                @endcan

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
                                @can('confirm', $event)
                                    <button type="button" class="custom-btn btn-14" data-toggle="modal" data-target="#modalImg" style="margin: 10px;"> Añadir Imagen </button>
                                @else
                                    <button class="custom-btn btn-14" data-toggle="modal" data-target="#modalConfirm{{$event->id_evento}}" style="margin: 10px">Confirmar</button>

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

                                @endcan


                            </div>
                        </div>

                    </div>

            @endforeach
        </div>
    </div>

    @endauth

@endsection
