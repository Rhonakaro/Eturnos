<?php 

  $patients_controller = new PatientsController();

  $patients = $patients_controller->get();

  $accion = (isset($_POST['accion'])) ? $_POST['accion'] : "";

  $showmodal = false;
  $modalshow = false;
  $showmessage = false;
  $modaljournal = false;
  

  switch ($accion) {

    case 'btnupd':

          $showmessage = true;

          $save_user = array(

            'idus' => $_POST['txtID'],
            'lname' => $_POST['txtLNAME'],
            'name' => $_POST['txtNAME'],
            'mail' => $_POST['txtMAIL'],
            'roll' => $_POST['txtROLL']
          );

          $user = $users_controller->profile($save_user);

          print ('
                  <!-- modal message-->
                  <div class="row">
                    <div class="col-xs-12">
                      <form action="" method="post" >
                        <!-- Modal -->
                        <div class="modal fade" id="message" tabindex="-1" role="dialog" aria-labelledby="changepass_Label" aria-hidden="true">
                          <div class="modal-dialog modal-sm">
                            <div class="modal-content">
                              <div class="modal-body">
                                <div class="text-center">
                                  <h4 class="alert-heading"> Successful Action</h4>
                                </div>
                              </div>
                              <div class="modal-footer">
                                <div class="form-group col-md-12">
                                  <div class="row">
                                    <div class="text-center">
                                      <a href="users" class="btn btn-default">Back</a>
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
                ');         

    break;

    case 'btndel':

          $showmessage = true;
           
          $user = $users_controller->del($_POST['txtID']);

          print ('
                  <!-- modal message-->
                  <div class="row">
                    <div class="col-xs-12">
                      <form action="" method="post" >
                        <!-- Modal -->
                        <div class="modal fade" id="message" tabindex="-1" role="dialog" aria-labelledby="changepass_Label" aria-hidden="true">
                          <div class="modal-dialog modal-sm">
                            <div class="modal-content">
                              <div class="modal-body">
                                <div class="text-center">
                                  <h4 class="alert-heading"> Successful Action</h4>
                                </div>
                              </div>
                              <div class="modal-footer">
                                <div class="form-group col-md-12">
                                  <div class="row">
                                    <div class="text-center">
                                      <a href="users" class="btn btn-default">Back</a>
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
                ');

    break;

    case 'Select':

          $showmodal = true;

    break;

    case 'Password':

          $modalshow = true;          

    break;

    case 'pass':

          $pass_user = array(

            'idus' => $_POST['txtID'],
            'pass' => $_POST['txtPASS']
          );
            
          $user = $users_controller->password($pass_user);

          $showmessage = true;

          print ('
                  <!-- modal message-->
                  <div class="row">
                    <div class="col-xs-12">
                      <form action="" method="post" >
                        <!-- Modal -->
                        <div class="modal fade" id="message" tabindex="-1" role="dialog" aria-labelledby="changepass_Label" aria-hidden="true">
                          <div class="modal-dialog modal-sm">
                            <div class="modal-content">
                              <div class="modal-body">
                                <div class="text-center">
                                  <h4 class="alert-heading"> Successful Action</h4>
                                </div>
                              </div>
                              <div class="modal-footer">
                                <div class="form-group col-md-12">
                                  <div class="row">
                                    <div class="text-center">
                                      <a href="users" class="btn btn-default">Back</a>
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
                ');

    break;
    
  }
   
?>

<!-- central section -->
<div class="content-wrapper">

    
  <!-- content header -->
  <section class="content-header text-center">
    <div class="row">
      <h3><strong>Busqueda de Pacientes</strong></h3>
    </div>
  </section>
  <!-- fin content header -->


  <!-- main content -->
  <section class="content">

  
    <div class="row">
      <div class="col-md-4">
        <div class="box-body">
          <div class="box box-info">
            <form method="post" action="">
              <div class="box-header with-border">
                <h3 class="box-title">Busqueda de Paciente por Dni o Apellido</h3>
                <div class="pull-right">
                  <input type="submit" class="btn btn-default" name="accion" value="Select" >
                  <input type="hidden" name="crud" value="set">
                </div>
              </div>
              <div class="box-body">
                <div class="form-group col-md-5">
                  <label for="">Dni</label>
                  <select class="form-control" id="search1" name="txtDNI" style=""  required>
                    <option></option>
                    <?php for ($n=0; $n < count($patients); $n++) { ?>
                    <option> <?php echo $patients[$n]['dni']; ?> </option>
                    <?php } ?>
                  </select>
                </div>
                <div class="form-group col-md-7">
                  <label for="">Appellido y Nombre</label>
                  <select class="form-control" id="search2" name="txtPATIENT" style=""  required>
                    <option></option>
                    <?php for ($n=0; $n < count($patients); $n++) { ?>
                    <option> <?php echo ( $patients[$n]['lname'].', '.$patients[$n]['name'] ); ?> </option>
                    <?php } ?>
                  </select>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>

  
  </section>
  <!-- fin main content -->


</div>
<!-- fin central section -->