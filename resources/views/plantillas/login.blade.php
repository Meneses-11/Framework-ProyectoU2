@extends('plantillas.menuGerente')

@section('titulo')
Login
@endsection
@section('titulobar')
<div class="contentEmpresa ">
    <img src="{{ asset('img/logo.png') }}" alt="Logo" class="imgLogo">
</div>
@endsection
@section('estilos')
<link rel="stylesheet" href="/css/styleTabla.css">
<link rel="stylesheet" href="/css/styleLog.css">

@endsection
@section('opcionesDerecha')
<li><a class="dropdown-item" href="#">Registrarse</a></li>
<li><a class="dropdown-item" href="{{ route('inicio') }}">Inicio</a></li>

@endsection
@section('contenido')

<script src="https://code.jquery.com/jquery-2.2.0.min.js"></script>
    <script>
	function togglePassword() {
	var password = document.getElementById("password");
	var togglePassword = document.getElementById("togglePassword");
	if (password.type === "password") {
		password.type = "text";
		togglePassword.innerHTML = '<i class="far fa-eye-slash" title="Ocultar Contraseña"></i>';
	} else {
		password.type = "password";
		togglePassword.innerHTML = '<i class="far fa-eye" title="Ver Contraseña"></i>';
	}
	}

</script>
<div class="centrar">
 <div class="login">
    <h1>Inicio de Sesión</h1>
    <form id="l-f" action="{{route('validar')}}" method="post">
        @csrf

        <label class="control-label" for="username"><i class="fas fa-user"></i></label>
        <input type="text" name="usuario" placeholder="Nombre de Usuario" required>

        <label for="password"><i class="fas fa-lock"></i></label>
        <input type="password" name="password" id="password" placeholder="Contraseña" required>

        <span id="togglePassword" onclick="togglePassword()"><i class="far fa-eye" title="Ver Contraseña" ></i></span>

        <input type="submit" value="Iniciar Sesión">
    </form>
</div>
</div>


@endsection
