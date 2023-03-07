@extends('plantillas.menuCliente')
@section('contenido')
<div class="contPadre">
    <div class="contEvent">
        <div class="contTitEvent">
            <img src="{{ asset('img/copas-icon.png') }}" alt="">
            <h1 class="titEvent">Mis eventos</h1>
            <button class="custom-btn btn-13">Crear Evento</button>
        </div>
        <div class="eventos">
            <div class="evento"><h1>Evento 1</h1></div>
            <div class="evento"><h1>Evento 2</h1></div>
            <div class="evento"><h1>Evento 3</h1></div>
            <div class="evento"><h1>Evento 4</h1></div>
            <div class="evento"><h1>Evento 5</h1></div>
            <div class="evento"><h1>Evento 6</h1></div>
            <div class="evento"><h1>Evento 7</h1></div>
            <div class="evento"><h1>Evento 8</h1></div>
        </div>
    </div>
    <div class="contDesc">

    </div>
</div>
@endsection
