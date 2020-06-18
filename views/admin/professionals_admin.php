<?php 

  $professionals_controller = new ProfessionalsController();

  $professionals = $professionals_controller->get();

  $specs_controller = new SpecsController();

  $specs = $specs_controller->get();

  $accion = (isset($_POST['accion'])) ? $_POST['accion'] : "";

  $showmodal = $modalshow = $showmessage = $modaljournal = false;


  switch ($accion) {

    case 'btnupd':

          $showmessage = true;

          $save_professional = array(

            'idpr' => intval( $_POST['txtidpr'] ),
            'idspec' => intval( $_POST['txtspec'] )
            
          );

          $professional = $professionals_controller->specedit($save_professional);

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
                                      <a href="professionals_admin" class="btn btn-default">ATRÁS</a>
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
           
          $professional = $professionals_controller->del($_POST['txtidpr']);

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
                                      <a href="professionals_admin" class="btn btn-default">ATRÁS</a>
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
      <br><h3><strong>Gestión de Profesionales</strong></h3>
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
                  <h4 class="modal-title text-center" id="user_modalLabel"><strong>Perfil de Profesional</strong></h4>
                  <div class="pull-right">
                    <button type="button" class="btn btn-default" data-dismiss="modal" aria-label="Close">CERRAR</button>
                  </div>
                </div>
                <div class="modal-body">
                  <div class="form-row">
                    <div class="form-group col-md-12">
                      <label for=""><h4><strong>Id</strong></h4></label>
                      <input type="text" class="form-control" name="txtidpr" value="<?php echo $_POST['txtIDPR']; ?>" disabled style="font-size: 20px;">
                      <input type="hidden" name="txtidpr" value="<?php echo $_POST['txtIDPR']; ?>">
                      <br>
                    </div>
                    <div class="form-group col-md-6">
                      <label for=""><h4><strong>Apellido</strong></h4></label>
                      <input type="text" class="form-control" name="txtlname" value="<?php echo $_POST['txtLNAME']; ?>" required style="font-size: 20px;" disabled>
                      <br>
                    </div>
                    <div class="form-group col-md-6">
                      <label for=""><h4><strong>Nombre</strong></h4></label>
                      <input type="text" class="form-control" name="txtname" value="<?php echo $_POST['txtNAME']; ?>" required style="font-size: 20px;" disabled>
                      <br>
                    </div>
                    <div class="form-group col-md-6">
                      <label for=""><h4><strong>Especialidad</strong></h4></label>
                      <h4>
                        <select class="form-control" id="search4" name="txtspec" required>
                            <option value="<?php echo $_POST['txtSPEC']; ?>" ><?php echo $_POST['txtSPEC']; ?></option>
                            <?php for ($n=0; $n < count($specs); $n++) { ?>
                            <option ><?php echo ($specs[$n]['idspec'] .'_'.$specs[$n]['spec']) ?></option>
                            <?php } ?> 
                        </select>
                      </h4>
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

  
    <!-- tabla profesionales -->        
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
                        <th class="text-center" aria-controls="tusers" rowspan="1" colspan="1" style="width: 150px;"><h4><strong>Accción</strong></h4></th>
                      </tr>
                    </thead>
                    <tbody>  
                      <?php for ($n=0; $n < count($professionals); $n++) { ?>
                        <tr role="row" class="odd">
                          <td class="text-center"><h4><?php echo $professionals[$n]['idpr'] ?></h4></td>
                          <td class="text-center"><h4><?php echo ( $professionals[$n]['lname']. ', '. $professionals[$n]['name'] );?></h4></td>
                          <td class="text-center"><h4><?php echo $professionals[$n]['spec'] ?></h4></td>
                          <td class="text-center">
                            <form action="" method="post">
                                <input type="hidden" name="txtIDPR" value="<?php echo $professionals[$n]['idpr']; ?>" >
                                <input type="hidden" name="txtLNAME" value="<?php echo $professionals[$n]['lname']; ?>" >
                                <input type="hidden" name="txtNAME" value="<?php echo $professionals[$n]['name']; ?>" >
                                <input type="hidden" name="txtSPEC" value="<?php echo $professionals[$n]['spec']; ?>" >
                                <div class="">
                                  <input type="submit" class="btn bg-orange" name="accion" value="Select">
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