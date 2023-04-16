@extends('plantillas.menuGerente')

@section('titulo')
Login
@endsection
@section('titulobar')
<div class="contentEmpresa ">
    <img src="{{ asset('img/logo.png') }}" alt="Logo" class="imgLogo">

</div>
@endsection

@section('opcionesDerecha')
<li><a class="dropdown-item" href="{{ route('registrarse') }}">Registrarse</a></li>
@endsection
@section('contenido')
<style>


body {
	background-color: rgb(63, 63, 63);
	font-family: Arial, sans-serif;
}
.fa, .fab, .fal, .far, .fas {
  line-height: 2 !important;
}

.login {
	width: 400px;
	margin: 100px auto;
	background-color: #fff;
	padding: 20px;
	border-radius: 10px;
	box-shadow: 0 0 10px rgba(0,0,0,0.5);
}

h1 {
	text-align: center;
	margin-bottom: 30px;
	color: #333;
}

form {
	display: flex;
	flex-direction: column;
}

label {
	display: flex;
	align-items: center;
	margin-bottom: 10px;
	color: #333;
}

input[type="text"],
input[type="password"] {
	padding: 10px;
	border: none;
	border-bottom: 2px solid #ccc;
	font-size: 16px;
}

input[type="submit"] {
	background-color: #333;
	color: #fff;
	padding: 10px;
	border: none;
	border-radius: 5px;
	margin-top: 20px;
	font-size: 16px;
	cursor: pointer;
}

input[type="submit"]:hover {
	background-color: #555;
}

#togglePassword {
	display: flex;
	align-items: center;
	margin-left: 0px;
	color: #333;
	cursor: pointer;
}

.fa-user,
.fa-lock {
	color: #333;
}

.fa-eye {

	color: #333;
}

input[type="password"].showPassword {
    font-family: sans-serif;
}

</style>
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
