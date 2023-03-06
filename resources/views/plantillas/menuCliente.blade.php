<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cliente</title>
    <link rel="stylesheet" href="/css/styleMenuClnt.css">
</head>
<body>
    <header>
        <nav>
            <a href="" class="opc-menu">
                <img src="/img/logo.png" alt="Logo" class="imgLogo">
            </a>
            <a href="{{route('paquetes')}}" class="opc-menu">Paquetes</a>
            <a href="{{route('eventos')}}" class="opc-menu">Mis eventos</a>
            <a href="{{route('informacion')}}" class="opc-menu">Descripcion</a>
        </nav>
        <button class="salir">Exit</button>
    </header>
    @yield('contenido')
</body>
</html>