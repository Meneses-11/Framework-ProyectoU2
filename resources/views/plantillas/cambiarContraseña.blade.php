@extends('plantillas.menuGerente')

@section('titulo')
Login
@endsection
@section('titulobar')
Bienvenido
@endsection
@section('estilos')
<link rel="stylesheet" href="/css/styleTabla.css">
<link rel="stylesheet" href="/css/styleLog.css">

@endsection
@section('opcionesDerecha')
<li><a class="dropdown-item" href="{{ route('login') }}">Login</a></li>
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
      <h1>Recuperar Contraseña</h1>
      <form id="rc-f" action="{{ route('cambiar_contraseña') }}" method="post">
        @csrf

        <p>Introduce la dirección de correo electrónico asociada con tu cuenta y te enviaremos un enlace para restablecer tu contraseña.</p>


        <label class="control-label" for="email"><i class="fas fa-cat"></i></label>
        <input class="fblanco" type="text" name="usuario" placeholder="Nombre de usuario" required>
            @if($errors->has('usuario'))
            <span class="text-danger">{{ $errors->first('usuario') }}</span>
            @endif
        <input class="fblanco" type="password" name="password_actual" placeholder="Contraseña Anterior" required>
            @if($errors->has('password_actual'))
            <span class="text-danger">{{ $errors->first('password_actual') }}</span>
            @endif
        <input class="fblanco" type="password" name="password_nueva" placeholder="Nueva Contraseña" required>
            @if($errors->has('password_nueva'))
            <span class="text-danger">{{ $errors->first('password_nueva') }}</span>
            @endif
        <input class="fblanco" type="password" name="password_confirmacion" placeholder="Confirma tu Nueva Contraseña" required>

        <input type="submit" value="Cambiar">
      </form>
    </div>
  </div>
@endsection
