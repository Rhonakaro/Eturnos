<?php
  

  $specs_controller = new SpecsController();

  $specs = $specs_controller->get();

  $accion = (isset($_POST['accion'])) ? $_POST['accion'] : "";

  $modaljournal = $showmodal = $modalshow = $showmessage = false;  
  
 
  switch ($accion) {

    case 'btnupd':

          $showmessage = true;

          $save_spec = array(

            'idspec' => $_POST['txtid'],
            'spec' => $_POST['txtspec'],
            'sptime' => $_POST['txtsptime']
          );

          $spec = $specs_controller->set($save_spec);

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
                                      <a href="specs_admin" class="btn btn-default"><strong>ATRAS</strong></a>
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
            
          $spec = $specs_controller->del($_POST['txtid']);

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
                                      <a href="specs_admin" class="btn btn-default"><strong>ATRAS</strong></a>
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
    

  <!-- content header (page header) -->
  <section class="content-header text-center">
    <div class="row">
      <br><h3><strong>Gestión de Especialidades</strong></h3><br>
    </div>
  </section>


  <!-- main content -->
  <section class="content">
  

    <!-- Inicio modal edicion spec -->
    <div class="row">
      <div class="col-xs-12">
        <form action="" method="post">
          <!-- Modal -->
          <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title text-center" id="modalLabel"><strong>Edición de Especialidad</strong></h4>
                  <div class="pull-right">
                    <button type="button" class="btn btn-default" data-dismiss="modal" aria-label="Close">CERRAR</button>
                  </div>
                </div>
                <div class="modal-body">
                  <div class="form-row">
                    <div class="form-group col-md-12">
                      <label for=""><h4><strong>Id</strong></h4></label>
                      <input type="text" class="form-control" name="txtid" id="txtid" value="<?php echo $_POST['txtid']; ?>" disabled style="font-size: 20px;">
                      <input type="hidden" name="txtid" id="txtid" value="<?php echo $_POST['txtid']; ?>">
                      <br>
                    </div>
                    <div class="form-group col-md-8">
                      <label for=""><h4><strong>Especialidad</strong></h4></label>
                      <input type="text" class="form-control" name="txtspec" id="txtspec" value="<?php echo $_POST['txtspec']; ?>" required style="font-size: 20px;">
                      <br>
                    </div>
                    <div class="form-group col-md-4">
                      <label for=""><h4><strong>Tiempo</strong></h4></label>
                      <select class="form-control col-md-3" name="txtsptime" required style="font-size: 20px; padding-bottom: 0px">
                        <option value="<?php echo $_POST['txtsptime']; ?>" style="font-size: 20px;"><?php echo $_POST['txtsptime']; ?></option>
                        <option value="10 am." style="font-size: 20px;">10 min.</option>
                        <option value="15 am." style="font-size: 20px;">15 min.</option>
                        <option value="20 am." style="font-size: 20px;">20 min.</option>
                        <option value="25 min." style="font-size: 20px;">25 min.</option>
                        <option value="30 min." style="font-size: 20px;">30 min.</option>
                        <option value="35 min." style="font-size: 20px;">35 min.</option>
                        <option value="40 min." style="font-size: 20px;">40 min.</option>
                        <option value="45 min." style="font-size: 20px;">45 min.</option>
                        <option value="50 min." style="font-size: 20px;">50 min.</option>
                        <option value="55 min." style="font-size: 20px;">55 min.</option>
                        <option value="60 min." style="font-size: 20px;">60 min.</option>
                      </select>
                      <br>
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
          </div>
        </form>
      </div>
    </div>
    <!-- fin modal edicion spec-->
       

    <!-- tabla Especialidades -->        
    <div class="row">
          <div class="col-md-6 col-md-offset-3">
            <div class="box box-info">
              
                 <div class="box-body">
                    <form method="post">
                        <input type="hidden" name="r" value="spec_admin-add">
                        <input class="button btn bg-purple" type="submit" value="NUEVA" >
                    </form>
                  </div>
              
              <!-- /.box-header -->
              <div class="box-body">
                <table class="table table-bordered" id="datatable">
                  <thead>
                    <tr role="row">
                        <th class="text-center" colspan="1" style="width: 30px"><h4><strong>#</strong></h4></th>
                        <th class="text-center" colspan="1" style="width: 140px"><h4><strong>Especialidad</strong></h4></th>
                        <th class="text-center" colspan="1" style="width: 50px"><h4><strong>Tiempo</strong></h4></th>
                        <th class="text-center" colspan="1" style="width: 30px"><h4><strong>Accción</strong></h4></th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php for ($n=0; $n < count($specs); $n++) { ?>
                    <tr role="row">
                      <td class="text-center"><h4><?php echo $specs[$n]['idspec']; ?></h4></td>
                      <td class="text-center"><h4><?php echo $specs[$n]['spec']; ?></h4></td> 
                      <td class="text-center"><h4><?php echo $specs[$n]['sptime']; ?></h4></td>
                      <td class="text-center">
                        <form action="" method="post">
                          <input type="hidden" name="txtid" value="<?php echo $specs[$n]['idspec']; ?>">
                          <input type="hidden" name="txtspec" value="<?php echo $specs[$n]['spec']; ?>">
                          <input type="hidden" name="txtsptime" value="<?php echo $specs[$n]['sptime']; ?>">
                          <div>
                            <input type="submit" class="btn bg-orange" name="accion" value="Select">
                          </div>
                        </form>
                      </td>
                    </tr>
                    <?php } ?>
                  </tbody>
                </table>
              </div>
              <!-- /.box-body -->
            </div>
            <!-- /.box -->
          </div>
    </div>
    <!-- fin tabla Especialidades --> 

  
  <!-- /.content -->
</div>
