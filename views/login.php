<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>eturnos - Login</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="./public/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="./public/bower_components/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="./public/bower_components/Ionicons/css/ionicons.min.css">
  <link rel="stylesheet" href="./public/dist/css/AdminLTE.css">
  <link rel="stylesheet" href="./public/plugins/iCheck/square/blue.css">
  <link rel="stylesheet" href="./public/plugins/fonts/font_google.css">
  <link rel="shortcut icon" type="image/png" href="./public/img/logo.png">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="login"><b>eturnos</b></a>
  </div>
  <div class="login-box-body">
    <p class="login-box-msg">Start your session</p>
    <form class="login" method="post">
      <div class="form-group has-feedback">
        <input type="email" class="form-control" name="mail" placeholder="Email" required>
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" name="pass" placeholder="Password" required>
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-8">
          <div class="checkbox icheck">
           
          </div>
        </div>
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
        </div>
      </div>
    </form>
   </div>
</div>
<script src="./public/bower_components/jquery/dist/jquery.min.js"></script>
<script src="./public/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="./public/plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' /* optional */
    });
  });
</script>
</body>
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
