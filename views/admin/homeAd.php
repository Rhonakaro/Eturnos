<?php

  $users_controller = new UsersController();

  $users = $users_controller->get();

  $rows_users = count($users);

  $specs_controller = new SpecsController();

  $specs = $specs_controller->get();

  $rows_specs = count($specs);

  $doctors_controller = new DoctorsController();
  
  $docs = $doctors_controller->get();

  $rows_docs = count($docs);

  $centers_controller = new CentersController();
  
  $centers = $centers_controller->get();

  $rows_centers = count($centers);
 
  $showmodal = false;
  $modalshow = false;

?>
<!-- Central section -->


<div class="content-wrapper">

  <section class="content">


    <!-- content header (Page header) -->
    <div class="row">
      <div class="text-center">
        <?php  
          $template = '
            <div class="row">
              
                <h2 class="text-primary">Hola %s, bienvenid@</h2>
             
            </div>
          ';
          printf(
            $template,
            $_SESSION['name']
          );
        ?>
      </div>
    </div>
    <!-- fin content header (Page header) -->

    
    <!-- small boxes: cantidad de usuarios -->
    <div class="row">
      <div class="container center-h center-v">
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-primary">
            <div class="inner">
              <h1><strong> <?php echo $rows_users ?> </h1></strong>
                <p><strong>Usuarios Registrados</strong></p>
            </div>
            <div class="icon">
              <small><i class="ion ion-person-add"></i></small>
            </div>
          </div>
        </div>
        <!-- fin small boxes: cantidad de usuarios -->


        <!-- small boxes: cantidad de especialidades -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h1><strong> <?php echo $rows_specs ?> </strong></h1>
                <p><strong>Specs Registradas</strong></p>
            </div>
            <div class="icon">
              <small><i class="glyphicon glyphicon-eye-open"></i></small>  
            </div>
          </div>
        </div>
        <!-- fin small boxes: cantidad de especialidades -->


        <!-- small boxes: cantidad de profesionales -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h1><strong> <?php echo $rows_docs ?> </strong></h1>
                <p><strong>Profesionales Registrados</strong></p>
            </div>
            <div class="icon">
              <small><i class="ion ion-person-add"></i></small>  
            </div>
          </div>
        </div>
        <!-- fin small boxes: cantidad de profesionalesdes -->


        <!-- small boxes: cantidad de centros -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h1><strong> <?php echo ($rows_centers - 1) ?> </strong></h1>
                <p><strong>Centros Registrados</strong></p>
            </div>
            <div class="icon">
              <small><i class="glyphicon glyphicon-home"></i></small>  
            </div>
          </div>
        </div>
        <!-- fin small boxes: cantidad de centros -->
      </div>
    </div>

    <div class="row">
      <div align="center">
        <img src="http://localhost/eturnos/public/plugins/assets/img/suport.gif">
      </div>
    </div>
  </section>
</div>