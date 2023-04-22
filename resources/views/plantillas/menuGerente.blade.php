<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="/css/styleNavBar.css">

    @yield('estilos')

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
    <title>@yield('titulo')</title>
    @yield('links')
    <style>
        .imgLogo{
        height: 65px;
        filter: brightness(200%) saturate(0%);
        margin: auto;
        display: block;
        }
    </style>
</head>

<body>
<div>
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
          <div class="container-fluid">
            <a class="navbar-brand" href="#"><div class="contentEmpresa ">
                <img src="{{ asset('img/logo.png') }}" alt="Logo" class="imgLogo">
                <div style="font-weight: bold;"> @yield('titulobar')</div>
            </div></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mobile_menu" aria-controls="mobile_menu" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="mobile_menu">
              <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                @yield('opcionesIzquierda')
              </ul>
              <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" style="padding-right: 5.5rem!important;padding-left: 1.rem!important;" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="bi bi-box-arrow-in-right"></i> Opciones </a>
                  <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    @yield('opcionesDerecha')

                  </ul>
                </li>
              </ul>
            </div>
          </div>
        </nav>

        </header>
</div>
    <div>
        @yield('contenido')
    </div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.0/js/bootstrap.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
    <script>
        $(document).ready(function(){
            // Activate tooltip
            $('[data-toggle="tooltip"]').tooltip();

            // Select/Deselect checkboxes
            var checkbox = $('table tbody input[type="checkbox"]');
            $("#selectAll").click(function(){
                if(this.checked){
                    checkbox.each(function(){
                        this.checked = true;
                    });
                } else{
                    checkbox.each(function(){
                        this.checked = false;
                    });
                }
            });
            checkbox.click(function(){
                if(!this.checked){
                    $("#selectAll").prop("checked", false);
                }
            });
        });
        $('.navbar-nav>li>a:not(.dropdown-toggle), .navbar-nav>li>div>a').on('click', function(){
            $('.navbar-collapse').collapse('hide');
        });
        $('#inputCheckIn').datepicker({
            uiLibrary: 'bootstrap4'
        });
        $('#inputCheckOut').datepicker({
            uiLibrary: 'bootstrap4'
        });
    </script>

  </html>
