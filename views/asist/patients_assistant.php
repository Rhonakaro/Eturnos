<?php 

  $patients_controller = new PatientsController();

  $patients = $patients_controller->get();

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
    <div class="row" style="margin-top: -10px; margin-bottom: -10px">
      <h3><strong>Pacientes</strong></h3>
    </div>
  </section>
  <!-- fin content header -->


  <!-- main content -->
  <section class="content">


    <!-- Inicio modal edición de paciente -->
    <div class="row">
      <div class="col-xs-12">
        <form action="" method="post">
          <!-- Modal -->
          <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="user_modalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title text-center" id="user_modalLabel">Perfil de Usuario</h5>
                  <input type="checkbox" name="checkbox" id="checkbox" class="chkAgree"><strong> &nbsp; &nbsp; Desea editar Paciente?</strong>
                  <div class="pull-right">
                    <button type="button" class="btn btn-info" data-dismiss="modal" aria-label="Close">Close</button>
                  </div>
                </div>
                <div class="modal-body">
                  <div class="form-row">
                    <div class="form-group col-md-10 col-md-offset-1">
                      <label for="idpa">N° de Paciente</label>
                      <input type="text" class="form-control" name="txtIDPA" value="<?php echo $_POST['txtidpa']; ?>" required disabled >
                      <input type="hidden" class="form-control" name="txtIDPA" value="<?php $_POST['txtidpa']; ?>">
                    </div>
                    <div class="form-group col-md-4 col-md-offset-1">
                      <label for="lname">Apellido</label>
                      <input type="text" class="form-control" id="submit" name="txtLNAME" value="<?php echo $_POST['txtlname']; ?>" required disabled >
                    </div>
                    <div class="form-group col-md-4">
                      <label for="exampleInputFile">Nombres</label>
                      <input type="text" class="form-control" id="submit" name="txtNAME" value="<?php echo $_POST['txtname']; ?>" required disabled >
                    </div>
                    <div class="form-group col-md-2">
                      <label for="dni">Dni</label>
                      <input type="text" class="form-control" id="submit" name="txtDNI" value="<?php echo $_POST['txtdni']; ?>" required disabled >
                    </div>
                    <div class="form-group col-md-2 col-md-offset-1">
                      <label for="age">Edad</label>
                      <input type="text" class="form-control" id="submit" name="txtDNI" value="<?php echo $_POST['txtage']; ?>" required disabled >
                    </div>
                    <div class="form-group col-md-2">
                      <label for="sex">Sexo</label>
                      <select class="form-control" name="txtSEX" style="" id="submit" required disabled>
                          <option value="<?php echo $_POST['txtsex']; ?>"><?php echo $_POST['txtsex']; ?></option>
                          <option value="F">F</option>
                          <option value="M">M</option>
                      </select>
                    </div>
                    <div class="form-group col-md-2">
                      <label for="blood">Factor</label>
                      <select class="form-control" name="txtBLOOD" style="" id="submit" required disabled>
                          <option value="<?php echo $_POST['txtblood']; ?>"><?php echo $_POST['txtblood']; ?></option>
                          <option value="0-">0-</option>
                          <option value="0+">0+</option>
                          <option value="A-">A-</option>
                          <option value="A+">A+</option>
                          <option value="B-">B-</option>
                          <option value="B+">B+</option>
                          <option value="AB-">AB-</option>
                          <option value="AB+">AB+</option>
                      </select>
                    </div>
                    <div class="form-group col-md-4">
                      <label for="telphone">Teléfono</label>
                      <input type="text" class="form-control" id="submit" name="txtTELPHONE" value="<?php echo $_POST['txttelphone']; ?>" required disabled >
                    </div>
                    <div class="form-group col-md-3 col-md-offset-1">
                      <label for="direction">Dirección</label>
                      <input type="text" class="form-control" id="submit" name="txtDIRECTION" value="<?php echo $_POST['txtdirection']; ?>" required disabled>
                    </div>
                    <div class="form-group col-md-3">
                      <label for="city">Ciudad</label>
                      <input type="text" class="form-control" id="submit" name="txtCITY" value="<?php echo $_POST['txtcity']; ?>" required disabled>
                    </div>
                    <div class="form-group col-md-4 ">
                      <label for="mail">Correo</label>
                      <input type="mail" class="form-control" id="submit" name="txtMAIL" value="<?php echo $_POST['txtmail']; ?>" required disabled>
                    </div>
                  </div>
                </div>
                <div class="modal-footer">
                  <div class="form-group col-md-12">
                    <div class="pull-right">
                      <a href="patients_assistant" class="btn btn-warning">Cancelar</a>
                    </div>
                    <div class="pull-right">
                      <button value="btnupd" type="submit" class="btn btn-successt" id="submit"  name="accion" disabled >Actualizar</button>
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
    <!-- fin modal edición de pacinete-->

    
    
    

    <!-- tabla Pacientes -->        
    <div class="row">
      <div class="col-md-12">
        <!-- /.box -->
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
                                <input type="submit" class="btn btn-warning" name="accion" value="Select" id="search">
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
            <!-- /.box-body -->
      </div>
          <!-- /.box -->
    </div>
    <!-- fin tabla Usuarios -->
    

  
  </section>
  <!-- fin main content -->


</div>
<!-- fin central section -->