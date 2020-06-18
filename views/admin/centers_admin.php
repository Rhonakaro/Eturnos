<?php
  

  $centers_controller = new CentersController();

  $centers = $centers_controller->get();

  $accion = (isset($_POST['accion'])) ? $_POST['accion'] : "";

  $modaljournal = $showmodal = $modalshow = $showmessage = false;  
  
 
  switch ($accion) {

    case 'btnupd':

          $showmessage = true;

          $save_center = array(

            'idce' => $_POST['txtIDCE'],
            'cname' => $_POST['txtCNAME'],
            'direction' => $_POST['txtDIRECTION'],
            'telphone' => $_POST['txtTELPHONE'],
            'type' => $_POST['txtTYPE']
          );

          $center = $centers_controller->set($save_center);

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
                                  <h4 class="alert-heading"> Actualización Exitosa!</h4>
                                </div>
                              </div>
                              <div class="modal-footer">
                                <div class="form-group col-md-12">
                                  <div class="row">
                                    <div class="text-center">
                                      <a href="centers_admin" class="btn btn-default">ATRAS</a>
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
            
          $center = $centers_controller->del($_POST['txtIDCE']);

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
                                  <h4 class="alert-heading"> Actualización Exitosa!</h4>
                                </div>
                              </div>
                              <div class="modal-footer">
                                <div class="form-group col-md-12">
                                  <div class="row">
                                    <div class="text-center">
                                      <a href="centers_admin" class="btn btn-default">ATRAS</a>
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
      <br><h3><strong>Gestión de Centros</strong></h3>
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
                  <h4 class="modal-title text-center" id="modalLabel"><strong>Edición de Centros</strong></h4>
                  <div class="pull-right">
                    <button type="button" class="btn btn-default" data-dismiss="modal" aria-label="Close">CERRAR</button>
                  </div>
                </div>
                <div class="modal-body">
                  <div class="form-row">
                    <div class="form-group col-md-12">
                      <label for=""><h4><strong>Id</strong></h4></label>
                      <input type="text" class="form-control" name="txtIDCE" value="<?php echo $_POST['txtidce']; ?>" disabled style="font-size: 20px;">
                      <input type="hidden" name="txtIDCE" value="<?php echo $_POST['txtidce']; ?>">
                      <br>
                    </div>
                    <div class="form-group col-md-6">
                      <label for=""><h4><strong>Nombre</strong></h4></label>
                      <input type="text" class="form-control" name="txtCNAME" value="<?php echo $_POST['txtcname']; ?>" required style="font-size: 20px;">
                      <br>
                    </div>
                    <div class="form-group col-md-6">
                      <label for=""><h4><strong>Dirección</strong></h4></label>
                      <input type="text" class="form-control" name="txtDIRECTION" value="<?php echo $_POST['txtdirection']; ?>" required style="font-size: 20px;">
                      <br>
                    </div>
                    <div class="form-group col-md-6">
                      <label for=""><h4><strong>Teléfono</strong></h4></label>
                      <input type="text" class="form-control" name="txtTELPHONE" value="<?php echo $_POST['txttelphone']; ?>" required style="font-size: 20px;">
                      <br>
                    </div>
                    <div class="form-group col-md-3">
                      <label for=""><h4><strong>Tipo</strong></h4></label>
                      <select class="form-control col-md-3" name="txtTYPE" required style="font-size: 20px padding-bottom: 0px">
                        <option value="<?php echo $_POST['txttype']; ?>" style="font-size: 20px"> <?php echo $_POST['txttype']; ?> </option>
                        <option value="CIC" style="font-size: 20px;">CIC</option>
                        <option value="CAP" style="font-size: 20px;">CAP</option>
                      </select>
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
          <div class="col-md-8 col-md-offset-2">
            <div class="box box-info">
              
                 <div class="box-body">
                    <form method="post">
                        <input type="hidden" name="r" value="center_admin-add">
                        <input class="button btn bg-purple" type="submit" value="NUEVO" >
                    </form>
                  </div>
              
              <!-- /.box-header -->
              <div class="box-body">
                <table class="table table-bordered" id="datatable">
                  <thead>
                    <tr role="row">
                        <th class="text-center" colspan="1" ><h4><strong>#</strong></h4></th>
                        <th class="text-center" colspan="1" ><h4><strong>Nombre</strong></h4></th>
                        <th class="text-center" colspan="1" ><h4><strong>Dirección</strong></h4></th>
                        <th class="text-center" colspan="1" ><h4><strong>Teléfono</strong></h4></th>
                        <th class="text-center" colspan="1" ><h4><strong>Tipo</strong></h4></th>
                        <th class="text-center" colspan="1" ><h4><strong>Acción</strong></h4></th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php for ($n=0; $n < count($centers); $n++) { ?>
                    <tr role="row">
                      <td class="text-center"><h4><?php echo $centers[$n]['idce']; ?></h4></td>
                      <td class="text-center"><h4><?php echo $centers[$n]['cname']; ?></h4></td> 
                      <td class="text-center"><h4><?php echo $centers[$n]['direction']; ?></h4></td>
                      <td class="text-center"><h4><?php echo $centers[$n]['telphone']; ?></h4></td>
                      <td class="text-center"><h4><?php echo $centers[$n]['type']; ?></h4></td>
                      <td class="text-center">
                        <form action="" method="post">
                          <input type="hidden" name="txtidce" value="<?php echo $centers[$n]['idce']; ?>" >
                          <input type="hidden" name="txtcname" value="<?php echo $centers[$n]['cname']; ?>" >
                          <input type="hidden" name="txtdirection" value="<?php echo $centers[$n]['direction']; ?>" >
                          <input type="hidden" name="txttelphone" value="<?php echo $centers[$n]['telphone']; ?>" >
                          <input type="hidden" name="txttype" value="<?php echo $centers[$n]['type']; ?>" >
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
