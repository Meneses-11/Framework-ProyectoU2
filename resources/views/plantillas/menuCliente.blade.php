<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('titulo')</title>
    <link rel="stylesheet" href="/css/styleBars.css">
    <link rel="stylesheet" href="/css/styleMenuClnt.css">
</head>
<header role="banner">
    <h1>Admin Panel</h1>
    <ul class="utilities">
      <br>
      <li class="logout warn"><a href="">Cerrar Sesion</a></li>
    </ul>
  </header>

  <nav  role='navigation'>
    <ul class="main">
        @yield('menu')
    </ul>
  </nav>


<body>
    <main role="main">
        <section class="panel important">

            @yield('contenido')
        </section>
</body>
  </main>
</html>

