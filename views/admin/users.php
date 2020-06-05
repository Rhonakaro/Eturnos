<?php 

  $users_controller = new UsersController();

  $users = $users_controller->get();

  $accion = (isset($_POST['accion'])) ? $_POST['accion'] : "";

  $showmodal = false;
  $modalshow = false;
  

  switch ($accion) {

    case 'btnupd':

          $save_user = array(

            'idus' => $_POST['txtID'],
            'lname' => $_POST['txtLNAME'],
            'name' => $_POST['txtNAME'],
            'mail' => $_POST['txtMAIL'],
            'roll' => $_POST['txtROLL']
          );

          $user = $users_controller->profile($save_user);

    break;

    case 'btndel':
            
          $user = $users_controller->del($_POST['txtID']);

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

    break;
    
  }
   
?>

<!-- central section -->
<div class="content-wrapper">
    
  <!-- content header (page header) -->
  <section class="content-header text-center">
    <div class="row">
      <h3><strong>Gestión de Usuarios</strong></h3>
    </div>
  </section>


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
                  <h5 class="modal-title text-center" id="user_modalLabel">Perfil de Usuario</h5>
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
                    <div class="form-group col-md-3">
                      <label for="">Roll</label>
                      <select class="form-control col-md-3"name="txtROLL" required>
                        <option value="<?php echo $_POST['txtROLL']; ?>"> <?php echo $_POST['txtROLL']; ?> </option>
                        <option value="dba">dba</option>
                        <option value="doc">doc</option>
                        <option value="aux">aux</option>
                      </select>
                    </div>
                    <div class="form-group col-md-9">
                      <label for="">Email</label>
                      <input type="email" class="form-control" name="txtMAIL" placeholder="" id="txtMAIL"  value=" <?php echo $_POST['txtMAIL']; ?> " required>
                      <br>
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

    
    <!-- modal change pass-->
    <div class="row">
      <div class="col-xs-12">
        <form action="" method="post" >
          <!-- Modal -->
          <div class="modal fade" id="change_pass" tabindex="-1" role="dialog" aria-labelledby="changepass_Label" aria-hidden="true">
            <div class="modal-dialog modal-sm">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title text-center" id="changepass_Label">Changing Password for <?php echo ($_POST['txtLNAME'].', ' .$_POST['txtNAME']); ?></h5>
                </div>
                <div class="modal-body">
                  <div class="form-row">
                    <div class="form-group col-6">
                      <label for="" class="">New Password</label> 
                        <div class="input-group">
                          <input type="hidden" name="txtID" value=" <?php echo ($_POST['txtID']); ?> ">
                          <input type="password" class="form-control pwd" name="txtPASS" value=" <?php echo ($_POST['txtPASS']); ?> ">
                          <span class="input-group-btn">
                            <button class="btn btn-default reveal" type="button"><i class="glyphicon glyphicon-eye-open"></i></button>
                          </span>          
                        </div>
                    </div>      
                  </div>
                </div>
                <div class="modal-footer">
                  <div class="form-group col-md-12">
                    <div class="pull-right">
                      <button type="button" class="btn btn-default" data-dismiss="modal" aria-label="Close">Close</button>
                    </div>
                    <div class="pull-left">
                      <button value="pass" type="submit" class="btn btn-default" name="accion">Save</button>
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
    <!-- fin modal change pass-->
    

    <!-- tabla Usuarios -->        
    <div class="row">
      <div class="col-xs-12">
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
                        <input class="button btn btn-primary" type="submit" value="NEW User">
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
                        <th class="text-center" aria-controls="tusers" rowspan="1" colspan="1" style="width: 300px;"><h4><strong>Apellido</strong></h4></th>
                        <th class="text-center" aria-controls="tusers" rowspan="1" colspan="1" style="width: 200px;"><h4><strong>Nombre</strong></h4></th>
                        <th class="text-center" aria-controls="tusers" rowspan="1" colspan="1" style="width: 300px;"><h4><strong>Correo</strong></h4></th>
                        <th class="text-center" aria-controls="tusers" rowspan="1" colspan="1" style="width: 200px;"><h4><strong>Roll</strong></h4></th>
                        <th class="text-center" aria-controls="tusers" rowspan="1" colspan="1" style="width: 150px;"><h4><strong>Action</strong></h4></th>
                      </tr>
                    </thead>
                    <tbody>  
                      <?php for ($n=0; $n < count($users); $n++) { ?>
                        <tr role="row" class="odd">
                          <td class="text-center"><h4> <?php echo $users[$n]['idus'] ?> </h4></td>
                          <td class="text-center"><h4> <?php echo $users[$n]['lname'] ?> </h4></td>
                          <td class="text-center"><h4> <?php echo $users[$n]['name'] ?> </h4></td>
                          <td class="text-center"><h4> <?php echo $users[$n]['mail'] ?> </h4></td>
                          <td class="text-center"><h4> <?php echo $users[$n]['roll'] ?> </h4></td>
                          <td class="text-center">
                            <form action="" method="post">
                                <input type="hidden" name="txtID" value=" <?php echo $users[$n]['idus']; ?> " >
                                <input type="hidden" name="txtLNAME" value=" <?php echo $users[$n]['lname']; ?> " >
                                <input type="hidden" name="txtNAME" value=" <?php echo $users[$n]['name']; ?> " >
                                <input type="hidden" name="txtMAIL" value=" <?php echo $users[$n]['mail']; ?> " >
                                <input type="hidden" name="txtPASS" value=" <?php echo $users[$n]['pass']; ?> " >
                                <input type="hidden" name="txtROLL" value=" <?php echo $users[$n]['roll']; ?> " >
                                <div class="pull-left">
                                  <input type="submit" class="btn btn-default" name="accion" value="Select">
                                </div>
                                <div class="pull-right">
                                  <input type="submit" class="btn btn-default" name="accion" value="Password">
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
    

    <!-- /.col -->
  </section>
  <!-- /.content -->
</div>



 

