<?php 

  $users_controller = new UsersController();

  $users = $users_controller->get();

  $accion = (isset($_POST['accion'])) ? $_POST['accion'] : "";

  $showmodal = false;
  $modalshow = false;
  $showmessage = false;

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
        <h5 class="modal-title text-center" id="ModalLabel">Change Password for <strong><?php echo ($_SESSION['lname']. ', ' . $_SESSION['name']); ?></strong></h5>
      </div>
      <div class="modal-body">
        <form action="" method="post">
          <div class="form-group">
            <div class="form-group col-6">
              <label for="" class="">New Password</label> 
                <div class="input-group">
                  <input type="hidden" name="txtID" value=" <?php echo ($_SESSION['idus']); ?> ">
                  <input type="password" class="form-control pwd" name="txtPASS" value=" <?php echo ($_SESSION['pass']); ?> ">
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
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
        <div class="pull-right">
          <button type="button" class="btn btn-default">Save changes</button>
        </div>
      </div>
    </div>
  </div>
</div>
  <!-- fin Modal Profile -->


  <body class="hold-transition skin-yellow sidebar-mini">
    <div class="wrapper">
      <header class="main-header">
        <a href="./" class="logo">
         <span class="logo-mini"><font color="black"><b>E</b></font></span>
         <span class="logo-lg"><font color="black"><b>eturnos</b></font></span>
        </a>
        <nav class="navbar navbar-static-top">
          <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button" style="color: black; ">
            <span class="sr-only">Toggle navigation</span>
          </a>
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <li>
                  <h5 style="margin-top: 18px;"><strong><font color="black"><?php echo  ( ' Hola!,  Bienvenid@: ' ); ?></font></strong></h5>
              </li>
              <li class="dropdown user user-menu">
                <a href="" class="dropdown-toggle" data-toggle="dropdown">
                  <span><strong><font color="black"><?php echo  ($_SESSION['lname']. ', ' . $_SESSION['name']); ?></font></strong></span>
                  <img src="http://localhost/eturnos/public/plugins/assets/img/comonuser.png" class="user-image" alt="User Image">
                </a>
                <ul class="dropdown-menu">
                  <li class="user-header">
                    <img src="http://localhost/eturnos/public/plugins/assets/img/comonuser.png" class="img-circle">
                    <p><strong><font color="black"><?php
                        if ( $_SESSION['roll'] == 'dba' ) {
                              echo "Administrador";
                        } elseif ( $_SESSION['roll'] == "prof" ) {
                              echo "Profesional de la Salud";
                        } else {
                              echo "Auxiliar Administrativo";
                        }
                      ?></font></strong></p>
                  </li>
                  <li class="user-footer">
                    <div class="pull-left">
                      <div class="box-body">
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#profile_user"><font color="black">
                          Profile</font>
                        </button>
                      </div>
                    </div>
                    <div class="pull-right">
                      <div class="box-body">
                        <a href="out" type="button" class="btn btn-warning btn-flat"><font color="black">Sign out</font></a>
                      </div>
                    </div>
                  </li>
                </ul>
                <li>
                  <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears" style="color:black"></i></a>
                </li>
              </li>
            </ul>
          </div>
        </nav>
      </header>



         