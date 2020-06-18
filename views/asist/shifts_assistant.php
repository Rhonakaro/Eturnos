<?php 

  $shifts_controller = new ShiftsController();

  $shifts = $shifts_controller->get();

  $accion = (isset($_POST['accion'])) ? $_POST['accion'] : "";

  $showmodal = $modalshow = $showmessage = $modaljournal = false;

  
  /*switch ($accion) {

    case 'btnupd':

          $showmessage = true;

          $save_patient = array(

            'idpa' => $_POST['txtIDPA'],
            'dni' => $_POST['txtDNI'],
            'lname' => $_POST['txtLNAME'],
            'name' => $_POST['txtNAME'],
            'age' => intval( $_POST['txtAGE'] ),
            'sex' => $_POST['txtSEX'],
            'blood' => $_POST['txtBLOOD'],
            'mail' => $_POST['txtMAIL'],
            'direction' => $_POST['txtDIRECTION'],
            'district' => $_POST['txtDISTRICT'],
            'city' => $_POST['txtCITY'],
            'telphone' => $_POST['txtTELPHONE']
          );

          $patient = $patients_controller->set($save_patient);

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
                                  <h4 class="alert-heading">Modificación Exitosa!</h4>
                                </div>
                              </div>
                              <div class="modal-footer">
                                <div class="form-group col-md-12">
                                  <div class="row">
                                    <div class="text-center">
                                      <a href="patients_assistant" class="btn btn-default"><strong>ATRAS</strong></a>
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

    
    case 'Editar':

          $showmodal = true;
       
  }*/
   
?>

<!-- central section -->
<div class="content-wrapper">

    
  <!-- content header -->
  <section class="content-header text-center">
    <div class="row">
      <br><h2>Sistema de Turnos</h2>
    </div>
  </section>
  <!-- fin content header -->


  <!-- main content -->
  <section class="content">


    <!-- Inicio modal modificacion de turno -->
    <div class="row">
      <div class="col-xs-12">
        <form action="" method="post">
          <!-- Modal -->
          <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="user_modalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title text-center" id="user_modalLabel"><strong>Perfil de Usuario</strong></h4>
                  <input type="checkbox" name="checkbox" id="checkbox" class="chkAgree"> &nbsp; &nbsp; Desea editar Paciente?
                  <div class="pull-right">
                    <button type="button" class="btn btn-default btn-sm" data-dismiss="modal" aria-label="Close">CERRAR</button>
                  </div>
                </div>
                <div class="modal-body">
                  <div class="form-row">
                      <input type="hidden" class="form-control" name="txtIDPA" value="<?php echo $_POST['txtidpa']; ?>">
                      <div class="form-group col-md-5">
                        <h4><label><strong>Apellido</strong></label></h4>
                        <input type="text" class="form-control" id="submit" name="txtLNAME" value="<?php echo $_POST['txtlname']; ?>" required disabled style="font-size: 20px;">
                      </div>
                      <div class="form-group col-md-5">
                        <h4><label><strong>Nombres</strong></label></h4>
                        <input type="text" class="form-control" id="submit" name="txtNAME" value="<?php echo $_POST['txtname']; ?>" required disabled style="font-size: 20px;">
                      </div>
                      <div class="form-group col-md-2 ">
                        <h4><label><strong>Edad</strong></label></h4>
                        <input type="text" class="form-control" id="submit" name="txtAGE" value="<?php echo $_POST['txtage']; ?>" required disabled style="font-size: 20px;">
                      </div>
                      <div class="form-group col-md-5">
                        <h4><label><strong>Dni</strong></label></h4>
                        <input type="text" class="form-control" id="submit" name="txtDNI" value="<?php echo $_POST['txtdni']; ?>" required disabled style="font-size: 20px;">
                      </div>
                      
                      <div class="form-group col-md-5">
                        <h4><label><strong>Teléfono</strong></label></h4>
                        <input type="text" class="form-control" id="submit" name="txtTELPHONE" value="<?php echo $_POST['txttelphone']; ?>" disabled style="font-size: 20px;">
                      </div>
                      <div class="form-group col-md-2">
                        <h4><label><strong>Sex</strong></label></h4>
                        <select class="form-control" name="txtSEX" style="" id="submit" required disabled style="font-size: 20px; padding-bottom: 0px">
                            <option value="<?php echo $_POST['txtsex']; ?>" style="font-size: 20px;"><?php echo $_POST['txtsex']; ?></option>
                            <option value="F" style="font-size: 20px;">F</option>
                            <option value="M" style="font-size: 20px;">M</option>
                            <option value="O" style="font-size: 20px;">O</option>
                        </select>
                      </div>
                      <div class="form-group col-md-6">
                        <h4><label><strong>Dirección</strong></label></h4>
                        <input type="text" class="form-control" id="submit" name="txtDIRECTION" value="<?php echo $_POST['txtdirection']; ?>" required disabled style="font-size: 20px;">
                      </div>
                      <div class="form-group col-md-6">
                        <h4><label><strong>Barrio</strong></label></h4>
                        <input type="text" class="form-control" id="submit" name="txtDISTRICT" value="<?php echo $_POST['txtdistrict']; ?>" required disabled style="font-size: 20px;">
                      </div>
                       <div class="form-group col-md-7">
                        <h4><label><strong>Ciudad</strong></label></h4>
                        <input type="text" class="form-control" id="submit" name="txtCITY" value="<?php echo $_POST['txtcity']; ?>" required disabled style="font-size: 20px;">
                      </div>
                      <div class="form-group col-md-3 col-md-offset-2">
                        <h4><label><strong>Factor</strong></label></h4>
                        <select class="form-control" name="txtBLOOD" style="" id="submit" disabled style="font-size: 20px;">
                            <option value="<?php echo $_POST['txtblood']; ?>" style="font-size: 20px;"><?php echo $_POST['txtblood']; ?></option>
                            <option value="0-" style="font-size: 20px;">0-</option>
                            <option value="0+" style="font-size: 20px;">0+</option>
                            <option value="A-" style="font-size: 20px;">A-</option>
                            <option value="A+" style="font-size: 20px;">A+</option>
                            <option value="B-" style="font-size: 20px;">B-</option>
                            <option value="B+" style="font-size: 20px;">B+</option>
                            <option value="AB-" style="font-size: 20px;">AB-</option>
                            <option value="AB+" style="font-size: 20px;">AB+</option>
                        </select>
                      </div>
                      <div class="form-group col-md-12 ">
                        <h4><label><strong>Correo</strong></label></h4>
                        <input type="mail" class="form-control" id="submit" name="txtMAIL" value="<?php echo $_POST['txtmail']; ?>" disabled style="font-size: 20px;">
                        <br><br>
                      </div>
                  </div>
                </div>
                <div class="modal-footer">
                  <div class="form-group col-md-12">
                    <div class="pull-right">
                      <button value="btnupd" type="submit" id="buttonsend" class="btn btn-success" name="accion" disabled><strong>GUARDAR</strong></button>
                    </div>
                    <div class="pull-left">
                      <a href="patients_assistant" class="btn btn-default"><strong>CANCELAR</strong></a>
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
    <!-- fin modal modificacion de turno-->

    
    
    

    <!-- tabla turnos -->        
    <div class="row">
      <div class="col-md-12">
        <!-- /.box -->
        <div class="box box-info">
              <div class="box-header with-border">
                  <div class="box-body">
                    <div class="pull-left">
                      <form method="post">
                        <input type="hidden" name="r" value="shift_assistant-add">
                        <input class="button btn btn-info btn-sm" type="submit" value="NUEVO"> 
                      </form>
                    </div>
                  </div>
                  <div class="box-body">
                    <table class="table table-bordered" id="datatable">
                      <thead>
                        <tr role="row">
                            <th class="text-center" colspan="1" ><h5><strong>Dni</strong></h5></th>
                            <th class="text-center" colspan="1" ><h5><strong>Paciente</strong></h5></th>
                            <th class="text-center" colspan="1" ><h5><strong>Correo</strong></h5></th>
                            <th class="text-center" colspan="1" ><h5><strong>Especialidad</strong></h5></th>
                            <th class="text-center" colspan="1" ><h5><strong>Profesional</strong></h5></th>
                            <th class="text-center" colspan="1" ><h5><strong>Centro</strong></h5></th>
                            <th class="text-center" colspan="1" ><h5><strong>Fecha</strong></h5></th>
                            <th class="text-center" colspan="1" ><h5><strong>Hora</strong></h5></th>
                            <th class="text-center" colspan="1" ><h5><strong>Estado</strong></h5></th>
                            <th class="text-center" colspan="1" ><h5><strong>Acción</strong></h5></th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php for ($n=0; $n < count($shifts); $n++) { ?>
                        <tr role="row">
                          <!--<td class="text-center" ><h4><?php echo $shifts[$n]['idsf']; ?></h4></td>-->
                          <!--<td class="text-center" ><h4><?php echo $shifts[$n]['registry']; ?></h4></td>-->
                          <td class="text-center" ><h5><?php echo $shifts[$n]['dni']; ?></h5></td>
                          <td class="text-center" ><h5><?php echo ($shifts[$n]['lnamepa'].',  '.$shifts[$n]['namepa']); ?></h5></td>
                          <td class="text-center" ><h5><?php echo $shifts[$n]['mail']; ?></h5></td>
                          <td class="text-center" ><h5><?php echo $shifts[$n]['spec']; ?></h5></td>
                          <td class="text-center" ><h5><?php echo ($shifts[$n]['lname'].', '.$shifts[$n]['name']); ?></h5></td>
                          <td class="text-center" ><h5><?php echo $shifts[$n]['cname']; ?></h5></td>
                          <td class="text-center" ><h5><?php echo $shifts[$n]['sdate']; ?></h5></td>
                          <td class="text-center" ><h5><?php echo $shifts[$n]['hour']; ?></h5></td>
                          <td class="text-center" ><h5><?php echo $shifts[$n]['state']; ?></h5></td>
                          <td class="text-center">
                            <form action="" method="post">
                              <input type="hidden" name="txtidsf" value="<?php echo $shifts[$n]['idsf']; ?>" >
                              <input type="hidden" name="txtregistry" value="<?php echo $shifts[$n]['registry']; ?>" >
                              <input type="hidden" name="txtdni" value="<?php echo $shifts[$n]['dni']; ?>" >
                              <input type="hidden" name="txtlnamepa" value="<?php echo $shifts[$n]['lnamepa']; ?>" >
                              <input type="hidden" name="txtnamepa" value="<?php echo $shifts[$n]['namepa']; ?>" >
                              <input type="hidden" name="txtmail" value="<?php echo $shifts[$n]['mail']; ?>" >
                              <input type="hidden" name="txtspec" value="<?php echo $shifts[$n]['spec']; ?>" >
                              <input type="hidden" name="txtlname" value="<?php echo $shifts[$n]['lname']; ?>" >
                              <input type="hidden" name="txtname" value="<?php echo $shifts[$n]['name']; ?>" >
                              <input type="hidden" name="txtcname" value="<?php echo $shifts[$n]['cname']; ?>" >
                              <input type="hidden" name="txtstate" value="<?php echo $shifts[$n]['state']; ?>" >
                              <input type="hidden" name="txthour" value="<?php echo $shifts[$n]['hour']; ?>" >
                              <input type="hidden" name="txtstate" value="<?php echo $shifts[$n]['state']; ?>" >
                              <div>
                                <input type="submit" class="btn bg-orange btn-sm" name="accion" value="Cancelar" textarea="black" >
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
    <!-- fin tabla pacientes -->

  
  </section>
  <!-- fin main content -->


</div>
<!-- fin central section -->