<?php 

  $users_controller = new UsersController();

  $users = $users_controller->get();

  $accion = (isset($_POST['accion'])) ? $_POST['accion'] : "";

  $showmodal = $modalshow = $showmessage = $modaljournal = false;
    

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
                                  <h4 class="alert-heading">Actualización Exitosa!</h4>
                                </div>
                              </div>
                              <div class="modal-footer">
                                <div class="form-group col-md-12">
                                  <div class="row">
                                    <div class="text-center">
                                      <a href="users_admin" class="btn btn-default"><strong>ATRAS</strong></a>
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
                                  <h4 class="alert-heading">Actualización Exitosa!</h4>
                                </div>
                              </div>
                              <div class="modal-footer">
                                <div class="form-group col-md-12">
                                  <div class="row">
                                    <div class="text-center">
                                      <a href="users_admin" class="btn btn-default"><strong>ATRAS</strong></a>
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
                                  <h4 class="alert-heading">Actualización Exitosa!</h4>
                                </div>
                              </div>
                              <div class="modal-footer">
                                <div class="form-group col-md-12">
                                  <div class="row">
                                    <div class="text-center">
                                      <a href="users_admin" class="btn btn-default"><strong>ATRAS</strong></a>
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
      <br><h3><strong>Gestión de Usuarios</strong></h3><br>
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
                  <h4 class="modal-title text-center" id="user_modalLabel"><strong>Perfil de Usuario</strong></h4>
                  <div class="pull-right">
                    <button type="button" class="btn btn-default" data-dismiss="modal" aria-label="Close">CERRAR</button>
                  </div>
                </div>
                <div class="modal-body">
                  <div class="form-row">
                    <div class="form-group col-md-12">
                      <label for=""><h4><strong>Id</strong></h4></label>
                      <input type="text" class="form-control" name="txtID" id="txtID" value="<?php echo $_POST['txtID']; ?>" disabled style="font-size: 20px;">
                      <input type="hidden" name="txtID" value="<?php echo $_POST['txtID']; ?>">
                      <br>
                    </div>
                    <div class="form-group col-md-6">
                      <label for=""><h4><strong>Apellido</strong></h4></label>
                      <input type="text" class="form-control" name="txtLNAME" id="txtLNAME" value="<?php echo $_POST['txtLNAME']; ?>" required style="font-size: 20px;">
                      <br>
                    </div>
                    <div class="form-group col-md-6">
                      <label for=""><h4><strong>Nombre</strong></h4></label>
                      <input type="text" class="form-control" name="txtNAME" id="txtNAME" value="<?php echo $_POST['txtNAME']; ?>" required style="font-size: 20px;">
                      <br>
                    </div>
                    <div class="form-group col-md-3">
                      <label for=""><h4><strong>Roll</strong></h4></label>
                      <select class="form-control col-md-3" name="txtROLL" required style="font-size: 20px; padding-bottom: 0px">
                        <option value="<?php echo $_POST['txtROLL']; ?>" style="font-size: 20px;"><?php echo $_POST['txtROLL']; ?></option>
                        <option value="dba" style="font-size: 20px;">dba</option>
                        <option value="prof" style="font-size: 20px;">prof</option>
                        <option value="aux" style="font-size: 20px;">aux</option>
                      </select>
                    </div>
                    <div class="form-group col-md-9">
                      <label for=""><h4><strong>Email</strong></h4></label>
                      <input type="email" class="form-control" name="txtMAIL" id="txtMAIL"  value="<?php echo $_POST['txtMAIL']; ?>" required style="font-size: 20px;">
                      <br>
                    </div>
                  </div>
                </div>
                <div class="modal-footer">
                  <div class="form-group col-md-12">
                    <div class="pull-right">
                      <button value="btnupd" type="submit" class="btn btn-success" name="accion"><strong>GUARDAR</strong></button>
                    </div>
                    <div class="pull-left">
                      <button value="btndel" type="submit" class="btn btn-danger" name="accion"><strong>ELIMINAR</strong></button>
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
                  <h4 class="modal-title text-center" id="changepass_Label">Cambio de Contraseña para: <br><strong><?php echo ($_POST['txtLNAME'].', ' .$_POST['txtNAME']); ?></strong></h4>
                </div>
                <div class="modal-body">
                  <div class="form-row">
                    <div class="form-group col-6">
                      <label for="" class=""><h4>Nueva Contraseña</h4></label> 
                        <div class="input-group">
                          <input type="hidden" name="txtID" value="<?php echo ($_POST['txtID']); ?>">
                          <input type="password" class="form-control pwd" name="txtPASS" value="<?php echo ($_POST['txtPASS']); ?>" style="font-size: 20px;">
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
                      <button value="pass" type="submit" class="btn btn-success" name="accion"><strong>GUARDAR</strong></button>
                    </div>
                    <div class="pull-left">
                      <button type="button" class="btn btn-default" data-dismiss="modal" aria-label="Close"><strong>CERRAR</strong></button>
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
      <div class="col-xs-8 col-xs-offset-2">
        <!-- /.box -->
        <div class="box box-info">
          <!-- /.box-header -->
          <div class="box-body">
            <div id="tusers_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
              <div class="row">
                <div class="col-sm-2">
                  <div class="dataTables_length" id="tusers_length">
                    <div class="box-body">
                      <form method="post">
                        <input type="hidden" name="r" value="user_admin-add">
                        <input class="button btn bg-purple" type="submit" value="NUEVO" >
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
                        <th class="text-center" aria-controls="tusers" rowspan="1" colspan="1" style="width: 150px;"><h4><strong>Roll</strong></h4></th>
                        <th class="text-center" aria-controls="tusers" rowspan="1" colspan="1" style="width: 200px;"><h4><strong>Acciones</strong></h4></th>
                      </tr>
                    </thead>
                    <tbody>  
                      <?php for ($n=0; $n < count($users); $n++) { ?>
                        <tr role="row" class="odd">
                          <td class="text-center"><h4><?php echo $users[$n]['idus'] ?></h4></td>
                          <td class="text-center"><h4><?php echo $users[$n]['lname'] ?></h4></td>
                          <td class="text-center"><h4><?php echo $users[$n]['name'] ?></h4></td>
                          <td class="text-center"><h4><?php echo $users[$n]['mail'] ?></h4></td>
                          <td class="text-center"><h4><?php echo $users[$n]['roll'] ?></h4></td>
                          <td class="text-center">
                            <form action="" method="post">
                                <input type="hidden" name="txtID" value="<?php echo $users[$n]['idus']; ?>" >
                                <input type="hidden" name="txtLNAME" value="<?php echo $users[$n]['lname']; ?>" >
                                <input type="hidden" name="txtNAME" value="<?php echo $users[$n]['name']; ?>" >
                                <input type="hidden" name="txtMAIL" value="<?php echo $users[$n]['mail']; ?>" >
                                <input type="hidden" name="txtPASS" value="<?php echo $users[$n]['pass']; ?>" >
                                <input type="hidden" name="txtROLL" value="<?php echo $users[$n]['roll']; ?>" >
                                <div class="pull-left">
                                  <input type="submit" class="btn bg-orange" name="accion" value="Select" textarea="black" >
                                </div>
                                <div class="pull-right">
                                  <input type="submit" class="btn bg-teal" name="accion" value="Password" style="color:black">
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