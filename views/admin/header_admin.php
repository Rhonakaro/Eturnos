<?php 

  $users_controller = new UsersController();

  $users = $users_controller->get();

  $accion = (isset($_POST['accion'])) ? $_POST['accion'] : "";

  $showmodal = $modalshow = $showmessage = false;  

?>


<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>eturnos</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="http://localhost/eturnos/public/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="http://localhost/eturnos/public/bower_components/font-awesome/css/font-awesome.css">
    <link rel="stylesheet" href="http://localhost/eturnos/public/bower_components/Ionicons/css/ionicons.css">
    <link rel="stylesheet" href="http://localhost/eturnos/public/dist/css/AdminLTE.min.css">
    <link rel="stylesheet" href="http://localhost/eturnos/public/dist/css/skins/_all-skins.min.css">
    <link rel="stylesheet" href="http://localhost/eturnos/public/bower_components/morris.js/morris.css">
    <link rel="stylesheet" href="http://localhost/eturnos/public/bower_components/jvectormap/jquery-jvectormap.css">
    <link rel="stylesheet" href="http://localhost/eturnos/public/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
    <link rel="stylesheet" href="http://localhost/eturnos/public/bower_components/bootstrap-daterangepicker/daterangepicker.css">
    <link rel="stylesheet" href="http://localhost/eturnos/public/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
    <link rel="stylesheet" href="http://localhost/eturnos/public/plugins/fonts/font_google.css">
    <link rel="stylesheet" href="http://localhost/eturnos/public/materialdesignicons.css">
    <link rel="stylesheet" href="http://localhost/eturnos/public/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="http://localhost/eturnos/public/css/select2.min.css">
    <link rel="shortcut icon" type="image/png" href="http://localhost/eturnos/public/plugins/assets/img/logo.png">
  </head>
  

                  
  <!-- Modal Profile -->
  <!-- Modal -->
<div class="modal fade" id="profile_user" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title text-center" id="ModalLabel">Cambio de Contraseña para: <br><strong><?php echo ($_SESSION['lname']. ', ' . $_SESSION['name']); ?></strong></h4>
      </div>
      <div class="modal-body">
        <form action="" method="post">
          <div class="form-group">
            <div class="form-group col-6">
              <label for="" class=""><h4>Nuevo Password</h4></label> 
                <div class="input-group">
                  <input type="hidden" name="txtID" value="<?php echo ($_SESSION['idus']); ?>">
                  <input type="password" class="form-control pwd" name="txtPASS" value="<?php echo ($_SESSION['pass']); ?>">
                  <span class="input-group-btn">
                    <button class="btn btn-default reveal" type="button"><i class="glyphicon glyphicon-eye-open"></i></button>
                  </span>          
                </div>
            </div>   
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <div class="pull-left">
          <button type="button" class="btn btn-default" data-dismiss="modal"><strong>CERRAR</strong></button>
        </div>
        <div class="pull-right">
          <button type="button" class="btn btn-success"><strong>GUARDAR</strong></button>
        </div>
      </div>
    </div>
  </div>
</div>
  <!-- fin Modal Profile -->


  <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
      <header class="main-header">
        <a href="./" class="logo">
         <span class="logo-mini"><b>E</b></span>
         <span class="logo-lg"><b>eturnos</b></span>
        </a>
        <nav class="navbar navbar-static-top">
          <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <li class="dropdown user user-menu">
                <a href="" class="dropdown-toggle" data-toggle="dropdown">
                  <img src="http://localhost/eturnos/public/plugins/assets/img/dba_user.png" class="user-image" alt="User Image">
                  <span><strong><?php echo ($_SESSION['lname']. ', ' . $_SESSION['name']); ?></strong></span>
                </a>
                <ul class="dropdown-menu">
                  <li class="user-header">
                    <img src="http://localhost/eturnos/public/plugins/assets/img/dba_user.png" class="img-circle">
                    <p><strong><?php
                        if ( $_SESSION['roll'] == 'dba' ) {
                              echo "System Administrator";
                        } elseif ( $_SESSION['roll'] == "prof" ) {
                              echo "Profesional de la Salud";
                        } else {
                              echo "Auxliliar Administrativo";
                        }
                      ?></strong></p>
                  </li>
                  <li class="user-footer">
                    <div class="pull-right">
                      <div class="box-body">
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#profile_user">
                          <strong>PERFIL</strong>
                        </button>
                      </div>
                    </div>
                    <div class="pull-left">
                      <div class="box-body">
                        <a href="out_admin" class="btn bg-yellow"><font color="black"><strong>SALIR</strong></font></a>
                      </div>
                    </div>
                  </li>
                </ul>
                <li>
                  <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
                </li>
              </li>
            </ul>
          </div>
        </nav>
      </header>



         