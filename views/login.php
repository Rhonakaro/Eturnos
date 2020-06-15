<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>eturnos</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="http://localhost/eturnos/public/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="http://localhost/eturnos/public/bower_components/font-awesome/css/font-awesome.css">
    <link rel="stylesheet" href="http://localhost/eturnos/public/bower_components/Ionicons/css/ionicons.css">
    <link rel="stylesheet" href="http://localhost/eturnos/public/dist/css/AdminLTE.min.css">
    <link rel="stylesheet" href="http://localhost/eturnos/public/css/blue.css">
    <link rel="stylesheet" href="http://localhost/eturnos/public/plugins/fonts/font_google.css">
    <link rel="shortcut icon" type="image/png" href="http://localhost/eturnos/public/plugins/assets/img/logo.png">
  </head>  
  <body class="hold-transition login-page">
    <div class="login-box">
      <div class="login-logo">
        <a href="login"><b>eturnos</b></a>
      </div>
      <div class="login-box-body">
        <h4><p class="login-box-msg">Iniciar Sesión</p></h4>
        <form class="login" method="post">
          <div class="form-group has-feedback">
            <input type="email" class="form-control" name="mail" placeholder="correo" required>
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="password" class="form-control" id="mypassword" name="pass" placeholder="contraseña" required>
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
          <div class="form-group ">
            <div class="row">
              <div class="col-xs-7 col-xs-offset-1">
                <div class="checkbox icheck">
                  <input type="checkbox" onclick="myFunction()">mostrar contraseña
                </div>
              </div>
              <div class="col-xs-4">
                <button type="submit" class="btn btn-info btn-block"><strong>Login</strong></button>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </body>
  <script src="http://localhost/eturnos/public/bower_components/jquery/dist/jquery.min.js"></script>
  <script src="http://localhost/eturnos/public/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
  <script src="http://localhost/eturnos/public/plugins/iCheck/icheck.min.js"></script>

    
  <script>
        function myFunction() {
          var x = document.getElementById("mypassword");
          if (x.type === "password") {
            x.type = "text";
          } else {
            x.type = "password";
          }
        }
  </script>

 
</html>

<?php 
  if( isset($_GET['error']) ) {
    $template = '
      <div class="col-3 container text-center p-1 mt-5 bg-primary  text-white">
        <h5 class="item  error">%s</h5>
      </div>
    ';
    printf($template, $_GET['error']);
  }
?>  