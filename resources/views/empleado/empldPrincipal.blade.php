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