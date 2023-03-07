<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/styleLogin.css">
    <title>Login</title>
</head>
<body>
    <script src="https://code.jquery.com/jquery-2.2.0.min.js"></script>
    <script>
          $(document).ready(function(){
            $("#register").click(function(){
              $("#login").css("background-color", "#ecf0f1");
              $("#login > span").css("color", "#333");
              $("#register").css("background-color", "#e74c3c");
              $("#register > span").css("color", "white");
              $("#l-f").toggle(500);
              $("#r-f").toggle(1000);
            })
            $("#login").click(function(){
              $("#register").css("background-color", "#ecf0f1");
              $("#register > span").css("color", "#333");
              $("#login").css("background-color", "#e74c3c");
              $("#login > span").css("color", "white");
              $("#l-f").toggle(1000);
              $("#r-f").toggle(500);
            })
          });
    </script>
    <div class="lr-wrapper" align="center">
                  <div class="lr-content">
                    <div class="lr-head">
                      <div class="lr-l_b" id="login" onClick>
                        <div></div>
                        <span>Iniciar Sesión</span>
                      </div>
                      <div class="lr-r_b" id="register">
                        <div></div>
                        <span>Registrarse</span>
                      </div>
                    </div>
                    <div class="lr-main">


                      <form id="l-f" action="{{route('validar')}}" method="post">
                        @csrf
                        <input type="text" id="username_login" name="usuario" class="l-username" placeholder="Username"/>
                        <input type="password" id="password_login" name="password" class="l-password" placeholder="Password"/>
                        <input type="submit" class="l-submit" value="Validar"/>
                      </form>





                      <form id="r-f" action="">
                        @csrf
                        <input type="email" id="r-email" class="r-email" name="r-email" placeholder="Email"/>
                        <input type="text" id="username_register" name="r-username" class="r-username" placeholder="Username"/>
                        <input type="password" id="password_register" name="r-password" class="r-password" placeholder="Password"/>
                        <input type="submit" name="l-submit" class="r-submit" value="Sign Up"/>
                      </form>
                    </div>
                  </div>
                </div>
</body>
</html>
