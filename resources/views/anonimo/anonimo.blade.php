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

@section('opcionesDerecha')
<li><a class="dropdown-item" href="{{ route('login') }}">Iniciar Sesion</a></li>
<li><a class="dropdown-item" href="{{ route('registrarse') }}">Registrarse</a></li>
@endsection

@section('contenido')
<div>
    @php
        $paquetes = $paquetes->where('activo',1);
    @endphp
    <div class="container-items">
        @foreach ($paquetes as $paquete)
        <a href="{{ route('login') }}" style="text-decoration: none; color:black;">
            <div class="item">


                    <figure>
                        <div class="slider">
                            @foreach ($paquete->imagenes as $item)
                                <div class="slide" >
                                    <img src={{$item->ruta }} alt="bodas" style= "margin: 0">
                                </div>
                            @endforeach
                        </div>

                        <div class="capa" style="margin-top: -12.5rem;">
                            <p class="Descripcion">{{ $paquete->descripcion }} </p>
                        </div>
                    </figure>


                <div class="info-producto">
                    <h2>{{ $paquete->nombre }}</h2>
                    <!--<p class="Descripcion">{{ $paquete->descripcion }} </p> -->
                   <!-- <button class="añade-carrito">Cotizar</button>-->
                </div>
            </div>
        </a>
        @endforeach

    </div>
 </div>

@endsection

@section('scripts')
<script>
  document.addEventListener('DOMContentLoaded', function() {
  var sliders = document.querySelectorAll('.slider');

  sliders.forEach(function(slider) {
    var slides = slider.querySelectorAll('.slide');
    var slideIndex = 0;

    function showSlide() {
      slides[slideIndex].classList.add('active');
    }

    function hideSlide() {
      slides[slideIndex].classList.remove('active');
    }

    function nextSlide() {
      hideSlide();
      slideIndex++;
      if (slideIndex >= slides.length) {
        slideIndex = 0;
      }
      showSlide();
    }

    function resetSlider() {
      hideSlide();
      slideIndex = 0;
      showSlide();
    }

    showSlide();
    setInterval(nextSlide, 2500);
    setInterval(resetSlider, slides.length * 2500);
  });
});
</script>
@endsection





