<?php 

  $doctors_controller = new DoctorsController();

  $doctors = $doctors_controller->get();

  $specs_controller = new SpecsController();

  $specs = $specs_controller->get();

  $accion = (isset($_POST['accion'])) ? $_POST['accion'] : "";

  $showmodal = false;
  $modalshow = false;
  $showmessage = false;
  $modaljournal = false;
  

  switch ($accion) {

    case 'btnupd':

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
  
    
  }
   
?>

<!-- central section -->
<div class="content-wrapper">

    
  <!-- content header -->
  <section class="content-header text-center">
    <div class="row">
      <h3><strong>Gestión de Profesionales</strong></h3>
    </div>
  </section>
  <!-- fin content header -->


  <!-- main content -->
  <section class="content">


    <!-- Inicio modal profile -->
    <div class="row">
      <div class="col-xs-12">
        <form action="" method="post">
          <!-- Modal -->
          <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="user_modalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title text-center" id="user_modalLabel">Perfil de Profesional</h5>
                  <div class="pull-right">
                    <button type="button" class="btn btn-default" data-dismiss="modal" aria-label="Close">Close</button>
                  </div>
                </div>
                <div class="modal-body">
                  <div class="form-row">
                    <div class="form-group col-md-12">
                      <label for="">Id</label>
                      <input type="text" class="form-control" name="txtID" placeholder="" id="txtID" value=" <?php echo $_POST['txtID']; ?> " disabled >
                      <input type="hidden" name="txtID" value="<?php echo $_POST['txtID']; ?>">
                      <br>
                    </div>
                    <div class="form-group col-md-6">
                      <label for="">Apellido</label>
                      <input type="text" class="form-control" name="txtLNAME" placeholder="" id="txtLNAME" value=" <?php echo $_POST['txtLNAME']; ?> " required>
                      <br>
                    </div>
                    <div class="form-group col-md-6">
                      <label for="">Nombre</label>
                      <input type="text" class="form-control" name="txtNAME" placeholder="" id="txtNAME" value=" <?php echo $_POST['txtNAME']; ?> " required>
                      <br>
                    </div>
                    <div class="form-group col-md-6">
                      <label for="">Spec</label>
                      <select class="form-control" id="search4" name="txtIDCE" style=""  required>
                          <option value="<?php echo $_POST['txtSPEC']; ?>"> <?php echo $_POST['txtSPEC']; ?> </option>
                          <?php for ($n=1; $n < count($specs); $n++) { ?>
                          <option> <?php echo ($specs[$n]['idspec'] .'_'.$specs[$n]['spec']) ?> </option>
                          <?php } ?> 
                      </select>
                    </div>
                  </div>
                </div>
                <div class="modal-footer">
                  <div class="form-group col-md-12">
                    <div class="pull-left">
                      <button value="btnupd" type="submit" class="btn btn-default" name="accion">Update</button>
                    </div>
                    <div class="pull-right">
                      <button value="btndel" type="submit" class="btn btn-default" name="accion">Delete</button>
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
    <!-- fin modal profile-->

  
    <!-- tabla Usuarios -->        
    <div class="row">
      <div class="col-xs-8 col-xs-offset-2">
        <!-- /.box -->
        <div class="box">
          <!-- /.box-header -->
          <div class="box-body">
            <div id="tusers_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
              <div class="row">
                <div class="col-sm-2">
                  <div class="dataTables_length" id="tusers_length">
                    <div class="box-body">
                      <form method="post">
                        <input type="hidden" name="r" value="user-add">
                        <input class="button btn btn-success" type="submit" value="New User">
                      </form>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-12">
                  <table id="datatable" class="table table-hover table-bordered dataTable" role="grid" aria-describedby="tusers_info">
                    <thead>
                      <tr role="row">
                        <th class="text-center" aria-controls="tusers" rowspan="1" colspan="1" style="width: 100px;"><h4><strong>#</strong></h4></th>
                        <th class="text-center" aria-controls="tusers" rowspan="1" colspan="1" style="width: 300px;"><h4><strong>Profesional</strong></h4></th>
                        <th class="text-center" aria-controls="tusers" rowspan="1" colspan="1" style="width: 200px;"><h4><strong>Especialidad</strong></h4></th>
                        <th class="text-center" aria-controls="tusers" rowspan="1" colspan="1" style="width: 150px;"><h4><strong>Action</strong></h4></th>
                      </tr>
                    </thead>
                    <tbody>  
                      <?php for ($n=0; $n < count($doctors); $n++) { ?>
                        <tr role="row" class="odd">
                          <td class="text-center"><h4> <?php echo $doctors[$n]['idoc'] ?> </h4></td>
                          <td class="text-center"><h4> <?php echo ( $doctors[$n]['lname']. ', '. $doctors[$n]['name'] );?> </h4></td>
                          <td class="text-center"><h4> <?php echo $doctors[$n]['spec'] ?> </h4></td>
                          <td class="text-center">
                            <form action="" method="post">
                                <input type="hidden" name="txtID" value=" <?php echo $doctors[$n]['idoc']; ?> " >
                                <input type="hidden" name="txtLNAME" value=" <?php echo $doctors[$n]['lname']; ?> " >
                                <input type="hidden" name="txtNAME" value=" <?php echo $doctors[$n]['name']; ?> " >
                                <input type="hidden" name="txtSPEC" value=" <?php echo $doctors[$n]['spec']; ?> " >
                                <div class="">
                                  <input type="submit" class="btn btn-default" name="accion" value="Select">
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
            <!-- /.box-body -->
      </div>
          <!-- /.box -->
    </div>
    <!-- fin tabla Usuarios -->
    

  
  </section>
  <!-- fin main content -->


</div>
<!-- fin central section -->