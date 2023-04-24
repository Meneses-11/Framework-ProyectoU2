@extends('plantillas.menuGerente')

@section('titulo')
Error
@endsection
@section('titulobar')
Error al Iniciar Sesión
@endsection
@section('estilos')

@endsection

@section('contenido')
<div style="margin-top: 8%">
<h5 style="margin: 2%; text-align: center;">
    Al parecer algo ha salido mal en el inicio de sesión verifica tu entrada de datos, de lo contrario si aún no tiene una cuenta puede registrarse
</h5>
<div style="text-align: center;">
    <h5>
        <a href="{{ route('registrarse') }}">Registrarse</a>
    </h5>
    <h5>
        <a href="{{ route('login') }}">Regresar</a>
    </h5>
</div>

</div>

@endsection


