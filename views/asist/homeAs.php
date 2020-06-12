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
 
  $showmodal = $modalshow = $modaljournal = $modalpatient = false;

?>
<!-- Central section -->


<div class="content-wrapper">

  

  <section class="content">

      <!-- Default box -->
      


      <!-- /.box -->

  </section>

    
  

</div>