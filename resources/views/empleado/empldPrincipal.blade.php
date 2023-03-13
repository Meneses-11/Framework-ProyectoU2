@extends('plantillas.princiEmpleado')
@section('titulo')
Empleado
@endsection
@section('titulobar')
<div class="contentEmpresa">
    <img src="img/logo.png" alt="Logo" class="imgLogo">
    <h1 class="empresah1">Eleganza</h1>
    <div><h1>Empleado</h1></div>
</div>
<div>
    <ul class="utilities">
      <br>
      <li class="logout warn" style="color: red;"><a href="{{ route('login') }}">Cerrar Sesion</a></li>
    </ul>
</div>
@endsection
@section('menu')
    <li class="edit"><a href="{{route('paquetes')}}">------</a></li>
@endsection
@contend('contenido')
    <div class="empleadoPrincipal">
        <div>
<!--       <table class="table">
            <thead class="table-dark">
                <tr>
                    <th>#</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Username</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th></th>
                </tr>
            </tbody>
            </table>  -->
            <!--
            <table class="table table-hover">
                <thead class="mdb-color darken-3">
                    <tr class="text-white">
                        <th>#</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Username</th>
                        <th>Country</th>
                        <th>City</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td>Mark</td>
                        <td>Otto</td>
                        <td>@mdo</td>
                        <td>USA</td>
                        <td>New York</td>
                    </tr>
                    <tr>
                        <th scope="row">2</th>
                        <td>Jacob</td>
                        <td>Thornton</td>
                        <td>@fat</td>
                        <td>Spain</td>
                        <td>Madrid</td>
                    </tr>
                    <tr>
                        <th scope="row">3</th>
                        <td>Larry</td>
                        <td>the Bird</td>
                        <td>@twitter</td>
                        <td>Italy</td>
                        <td>Rome</td>
                    </tr>
                    <tr>
                        <th scope="row">4</th>
                        <td>Anna</td>
                        <td>Doe</td>
                        <td>@anna</td>
                        <td>Poland</td>
                        <td>Warsaw</td>
                    </tr>
                    <tr>
                        <th scope="row">5</th>
                        <td>Mary</td>
                        <td>Kate</td>
                        <td>@olsen</td>
                        <td>Germany</td>
                        <td>Berlin</td>
                    </tr>
                </tbody>
            </table>
-->
        </div>
    </div>
@endcontend
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f2f2f2;
        padding: 20px;
    }
    h1 {
        color: #333;
        text-align: center;
        margin-bottom: 20px;
    }
    form {
        background-color: #fff;
        border-radius: 5px;
        box-shadow: 0 0 10px rgba(0,0,0,0.1);
        padding: 20px;
        max-width: 500px;
        margin: 0 auto;
    }
    label {
        display: block;
        margin-bottom: 5px;
    }
    input[type="text"], select {
        padding: 8px;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
        width: 100%;
        margin-bottom: 10px;
        font-size: 16px;
    }
    button[type="submit"] {
        background-color: #4CAF50;
        color: #fff;
        padding: 10px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        font-size: 16px;
        width: 100%;
    }
    button[type="submit"]:hover {
        background-color: #3e8e41;
    }
</style>
<h1>Agregar abonos a un evento</h1>
	<form>
		<label for="evento">Evento:</label>
		<select id="evento" name="evento">
			<option value="">Seleccione un evento</option>
			<option value="evento1">Evento 1</option>
			<option value="evento2">Evento 2</option>
			<option value="evento3">Evento 3</option>
		</select>

		<label for="tipo-abono">Tipo de abono:</label>
		<input type="text" id="tipo-abono" name="tipo-abono" placeholder="Ingrese el tipo de abono">

		<label for="precio-abono">Precio del abono:</label>
		<input type="text" id="precio-abono" name="precio-abono" placeholder="Ingrese el precio del abono">

		<button type="submit">Agregar abono</button>
	</form>
@endcontend

