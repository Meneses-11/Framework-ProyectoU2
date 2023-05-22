<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/styleNavBar.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">
    <title>Document</title>
</head>
<body>
    <div class="centrar" style="margin-top: 7rem">

    </div>
      <div class="container">
        <div class="row justify-content-center align-items-center vh-100">
          <div class="col-lg-6 col-md-8 col-sm-10">
            <div class="card p-4">
              <div class="card-header">
                <h1 class="text-center">Registro</h1>
              </div>
              <div class="card-body">
                <form action="{{ route('registrar_usuario') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Nombre:</label>
                        <input type="text" id="nombre" name="nombre" class="form-control" placeholder="Ingresa el nombre" required>
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Correo electrónico:</label>
                        <input type="email" name="correo" id="email" class="form-control" required placeholder="Ingresa el correo electrónico" required>
                        <span id="email-validation-message"></span>
                    </div>

                    <!-- Resto de tu código HTML -->

                    <button type="submit" class="btn btn-dark btn-block">Registrar Usuario</button>
                    <button type="button" class="btn btn-secondary btn-block mt-2" onclick="window.location.href='{{ route('usuario.inicio') }}'">Cancelar</button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>


    <!-- Resto de tu código HTML -->

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#email').on('keyup', function () {
                var correo = $(this).val();

                $.post('{{ route('correo') }}', { correo: correo }, function (response) {
                    if (response.existeCorreo) {
                        $('#email-validation-message').text('El correo ya está registrado');
                    } else {
                        $('#email-validation-message').text('El correo está disponible');
                    }
                });
            });
        });
    </script>
    </body>
    </html>
