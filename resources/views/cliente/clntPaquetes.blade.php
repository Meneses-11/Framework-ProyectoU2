@extends('plantillas.menuGerente')
@section('titulo')
    Salón Eventos
@endsection
@section('estilos')
    <link rel="stylesheet" href="/css/styleMenuClnt.css">
    <link rel="stylesheet" href="/css/styleAnonimo.css">
@endsection

@section('titulobar')
    Salón de Eventos
@endsection
@section('opcionesIzquierda')
    @can('viewAny', App\Models\Evento::class)
        <li class="nav-item"><a class="nav-link active" aria-current="page" href="{{ route('evento.index') }}">Mis eventos </a></li>
    @endcan
@endsection
@section('opcionesDerecha')
    <li><a class="dropdown-item" href="{{ route('cerrar_sesion') }}">Cerrar Sesion</a></li>
@endsection

@section('contenido')
    @can('viewAny', App\Models\Evento::class)
        <div>
            <div class="container-items">
                @foreach ($paquetes as $paquete)
                    @can('activo', $paquete)
                        <a href="{{ route('paquete.detalle', $paquete->id_paquete) }}" style="text-decoration: none; color:black;">
                            <div class="item">
                                <figure>
                                    <div class="slider">
                                        <ul class="slider-list">
                                            @foreach ($paquete->imagenes as $item)
                                                <li><img src={{ $item->ruta }} alt={{ $item->nombre }}></li>
                                            @endforeach
                                        </ul>
                                    </div>

                                    <script>
                                        // Obtener el número de imágenes
                                        const imageCount = document.querySelectorAll('.slider-list li').length;

                                        // Establecer la variable CSS --image-count en el elemento .slider-list si hay más de una imagen
                                        if (imageCount > 1) {
                                            document.documentElement.style.setProperty('--image-count', imageCount);
                                        } else {
                                            document.documentElement.style.setProperty('--image-count', 2); // Establecer un mínimo de 2 para que se mueva aunque solo haya una imagen
                                            //document.documentElement.style.setProperty('--image-count', 1);
                                            const sliderList = document.querySelector('.slider-list');
                                            sliderList.style.animation = 'none'; // Desactivar la animación si solo hay una imagen
                                        }
                                    </script>

                                    <div class="capa" style="margin-top: -12.5rem;">
                                        <p class="Descripcion">{{ $paquete->descripcion }}</p>
                                    </div>
                                </figure>
                                <div class="info-producto">
                                    <h2>{{ $paquete->nombre }}</h2>
                                    <!--<p class="Descripcion">{{ $paquete->descripcion }} </p> -->
                                <!-- <button class="añade-carrito">Cotizar</button>-->

                                </div>
                            </div>
                        </a>    
                    @endcan
                
                @endforeach

            </div>
        </div>
    @else
        @include('plantillas.error401')
    @endcan

@endsection
