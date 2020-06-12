<?php 

  $patients_controller = new PatientsController();

  $patients = $patients_controller->get();

  $accion = (isset($_POST['accion'])) ? $_POST['accion'] : "";

  $modalpatient = $showmodal = $modalshow = $showmessage = $modaljournal = false;
  

  switch ($accion) {

    case 'Guardar':

          $modalpatient = true;

          $save_patient = array(

                      'idpa' => intval($_POST['idpa']),
                      'dni' => $_POST['dni'],
                      'lname' => $_POST['lname'],
                      'name' => $_POST['name'],
                      'age' => intval($_POST['age']),
                      'mail' => $_POST['mail'],
                      'direction' => $_POST['direction'],
                      'city' => $_POST['city'],
                      'telphone' => $_POST['telphone'],
                      'sex' => $_POST['sex'],
                      'blood' => $_POST['blood']
          );

          var_dump($save_patient);

          $patient = $patients_controller->set($save_patient);

          /*print ('
                  <!-- modal message-->
                  <div class="row">
                    <div class="col-xs-12">
                      <form action="" method="post" >
                        <!-- Modal -->
                        <div class="modal fade" id="patient" tabindex="-1" role="dialog" aria-labelledby="changepass_Label" aria-hidden="true">
                          <div class="modal-dialog modal-sm">
                            <div class="modal-content">
                              <div class="modal-body">
                                <div class="text-center">
                                  <h4 class="alert-heading"> Actualizacion de Paciente Completa</h4>
                                </div>
                              </div>
                              <div class="modal-footer">
                                <div class="form-group col-md-12">
                                  <div class="row">
                                    <div class="text-center">
                                      <a href="patients" class="btn btn-default">Back</a>
                                    </div>
                                  </div>
                                </div>               
                              </div>
                            </div>
                          </div>
                        </div>
                        <!-- Button trigger modal -->
                      </form>
                    </div>
                  </div>
                  <!-- fin modal message-->
                ');*/ 
    break;
    
  }


          
  

 
   
?>

<!-- central section -->
<div class="content-wrapper">

    
  <!-- content header -->
  <section class="content-header text-center">
    <div class="row" style="margin-top: -10px; margin-bottom: -10px">
      <h3><strong>Pacientes</strong></h3>
    </div>
  </section>
  <!-- fin content header -->


  <!-- main content -->
  <section class="content">


    <div class="row">
          <div class="col-md-12">


            <div class="box box-info">
              <div class="box-header with-border">
                  <div class="box-body">
                    <h3 class="box-title">Busqueda de Paciente</h3>
                    <div class="pull-right">
                      <form method="post">
                        <input type="hidden" name="r" value="patient-add">
                        <input class="button btn bg-purple" type="submit" value="Agregar"> 
                      </form>
                    </div>
                  </div>
                  <div class="box-body">
                    <table class="table table-bordered" id="datatable">
                      <thead>
                        <tr role="row">
                            <th class="text-center" colspan="1" ><h4><strong>Paciente N°</strong></h4></th>
                            <th class="text-center" colspan="1" ><h4><strong>Dni</strong></h4></th>
                            <th class="text-center" colspan="1" ><h4><strong>Apellido</strong></h4></th>
                            <th class="text-center" colspan="1" ><h4><strong>Nombres</strong></h4></th>
                            <th class="text-center" colspan="1" ><h4><strong>Edad</strong></h4></th>
                            <th class="text-center" colspan="1" ><h4><strong>Sexo</strong></h4></th>
                            <th class="text-center" colspan="1" ><h4><strong>Gr. Sanguineo</strong></h4></th>
                            <th class="text-center" colspan="1" ><h4><strong>Correo</strong></h4></th>
                            <th class="text-center" colspan="1" ><h4><strong>Dirección</strong></h4></th>
                            <th class="text-center" colspan="1" ><h4><strong>Ciudad</strong></h4></th>
                            <th class="text-center" colspan="1" ><h4><strong>Teléfono</strong></h4></th>
                            <th class="text-center" colspan="1" ><h4><strong>Action</strong></h4></th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php for ($n=0; $n < count($patients); $n++) { ?>
                        <tr role="row">
                          <td class="text-center" ><h5> <?php echo $patients[$n]['idpa']; ?> </h5></td>
                          <td class="text-center" ><h5> <?php echo $patients[$n]['dni']; ?> </h5></td>
                          <td class="text-center" ><h5> <?php echo $patients[$n]['lname']; ?> </h5></td> 
                          <td class="text-center" ><h5> <?php echo $patients[$n]['name']; ?> </h5></td>
                          <td class="text-center" ><h5> <?php echo $patients[$n]['age']; ?> </h5></td>
                          <td class="text-center" ><h5> <?php echo $patients[$n]['sex']; ?> </h5></td>
                          <td class="text-center" ><h5> <?php echo $patients[$n]['blood']; ?> </h5></td>
                          <td class="text-center" ><h5> <?php echo $patients[$n]['mail']; ?> </h5></td>
                          <td class="text-center" ><h5> <?php echo $patients[$n]['direction']; ?> </h5></td>
                          <td class="text-center" ><h5> <?php echo $patients[$n]['city']; ?> </h5></td>
                          <td class="text-center" ><h5> <?php echo $patients[$n]['telphone']; ?> </h5></td>
                          <td class="text-center">
                            <form action="" method="post">
                              <input type="hidden" name="txtidpa" value="<?php echo $patients[$n]['idpa']; ?>" >
                              <input type="hidden" name="txtdni" value="<?php echo $patients[$n]['dni']; ?>" >
                              <input type="hidden" name="txtlname" value="<?php echo $patients[$n]['lname']; ?>" >
                              <input type="hidden" name="txtname" value="<?php echo $patients[$n]['name']; ?>" >
                              <input type="hidden" name="txtage" value="<?php echo $patients[$n]['age']; ?>" >
                              <input type="hidden" name="txtmail" value="<?php echo $patients[$n]['mail']; ?>" >
                              <input type="hidden" name="txtdirection" value="<?php echo $patients[$n]['direction']; ?>" >
                              <input type="hidden" name="txtcity" value="<?php echo $patients[$n]['city']; ?>" >
                              <input type="hidden" name="txttelphone" value="<?php echo $patients[$n]['telphone']; ?>" >
                              <input type="hidden" name="txtsex" value="<?php echo $patients[$n]['sex']; ?>" >
                              <input type="hidden" name="txtblood" value="<?php echo $patients[$n]['blood']; ?>" >
                              <div>
                                <input type="submit" class="btn btn-default" name="accion" value="Select" id="search">
                              </div>
                            </form>
                          </td>
                        </tr>
                        <?php } ?>
                      </tbody>
                    </table>
                  </div>
              </div>
            </div>


            


          </div>
    </div>

    
  
    
  
  
  </section>
  <!-- fin main content -->


</div>
<!-- fin central section -->