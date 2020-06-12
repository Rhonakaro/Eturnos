<?php
  

  $centers_controller = new CentersController();

  $centers = $centers_controller->get();

  $accion = (isset($_POST['accion'])) ? $_POST['accion'] : "";

  $modaljournal = false;
  $showmodal = false;
  $modalshow = false;
  $showmessage = false;
  
 
  switch ($accion) {

    case 'btnupd':

          $showmessage = true;

          $save_center = array(

            'idspec' => $_POST['txtid'],
            'spec' => $_POST['txtspec'],
            'sptime' => $_POST['txtsptime']
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
                                  <h4 class="alert-heading"> Successful Action</h4>
                                </div>
                              </div>
                              <div class="modal-footer">
                                <div class="form-group col-md-12">
                                  <div class="row">
                                    <div class="text-center">
                                      <a href="centers" class="btn btn-default">Back</a>
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
            
          $center = $centers_controller->del($_POST['txtid']);

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
                                      <a href="centers" class="btn btn-default">Back</a>
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
      <h3><strong>Gestión de Centros</strong></h3>
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
                  <h5 class="modal-title text-center" id="modalLabel">Edición de Centros</h5>
                  <div class="pull-right">
                    <button type="button" class="btn btn-default" data-dismiss="modal" aria-label="Close">Close</button>
                  </div>
                </div>
                <div class="modal-body">
                  <div class="form-row">
                    <div class="form-group col-md-12">
                      <label for="">Id</label>
                      <input type="text" class="form-control" name="txtid" placeholder="" id="txtid" value=" <?php echo $_POST['txtid']; ?> " disabled >
                      <input type="hidden" name="txtid" id="txtid" value=" <?php echo $_POST['txtid']; ?> ">
                      <br>
                    </div>
                    <div class="form-group col-md-6">
                      <label for="">Nombre</label>
                      <input type="text" class="form-control" name="txtcname" placeholder="" id="txtcname" value=" <?php echo $_POST['txtcname']; ?> " required >
                      <br>
                    </div>
                    <div class="form-group col-md-6">
                      <label for="">Dirección</label>
                      <input type="text" class="form-control" name="txtdirection" placeholder="" id="txtdirection" value=" <?php echo $_POST['txtdirection']; ?> " required >
                      <br>
                    </div>
                    <div class="form-group col-md-6">
                      <label for="">Teléfono</label>
                      <input type="text" class="form-control" name="txttelphone" placeholder="" id="txttelphone" value=" <?php echo $_POST['txttelphone']; ?> " required >
                      <br>
                    </div>
                    <div class="form-group col-md-3">
                      <label for="">Tipo</label>
                      <select class="form-control col-md-3" name="txttype" required>
                        <option value="<?php echo $_POST['txttype']; ?>"> <?php echo $_POST['txttype']; ?> </option>
                        <option value="cic">cic</option>
                        <option value="cap">cap</option>
                      </select>
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
          </div>
        </form>
      </div>
    </div>
    <!-- fin modal edicion spec-->
       

    <!-- tabla Especialidades -->        
    <div class="row">
          <div class="col-md-6 col-md-offset-3">
            <div class="box">
              
                 <div class="box-body">
                    <form method="post">
                        <input type="hidden" name="r" value="center-add">
                        <input class="button btn btn-danger" type="submit" value="New Center">
                    </form>
                  </div>
              
              <!-- /.box-header -->
              <div class="box-body">
                <table class="table table-bordered" id="datatable">
                  <thead>
                    <tr role="row">
                        <th class="text-center" colspan="1" style="width: 20px"><h4><strong>#</strong></h4></th>
                        <th class="text-center" colspan="1" style="width: 90px"><h4><strong>Nombre</strong></h4></th>
                        <th class="text-center" colspan="1" style="width: 125px"><h4><strong>Dirección</strong></h4></th>
                        <th class="text-center" colspan="1" style="width: 35px"><h4><strong>Teléfono</strong></h4></th>
                        <th class="text-center" colspan="1" style="width: 10px"><h4><strong>Tipo</strong></h4></th>
                        <th class="text-center" colspan="1" style="width: 20px"><h4><strong>Action</strong></h4></th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php for ($n=0; $n < count($centers); $n++) { ?>
                    <tr role="row">
                      <td class="text-center"><h4> <?php echo $centers[$n]['idce']; ?> </h4></td>
                      <td class="text-center"><h4> <?php echo $centers[$n]['cname']; ?> </h4></td> 
                      <td class="text-center"><h4> <?php echo $centers[$n]['direction']; ?> </h4></td>
                      <td class="text-center"><h4> <?php echo $centers[$n]['telphone']; ?> </h4></td>
                      <td class="text-center"><h4> <?php echo $centers[$n]['type']; ?> </h4></td>
                      <td class="text-center">
                        <form action="" method="post">
                          <input type="hidden" name="txtid" value=" <?php echo $centers[$n]['idce']; ?> " >
                          <input type="hidden" name="txtcname" value=" <?php echo $centers[$n]['cname']; ?> " >
                          <input type="hidden" name="txtdirection" value=" <?php echo $centers[$n]['direction']; ?> " >
                          <input type="hidden" name="txttelphone" value=" <?php echo $centers[$n]['telphone']; ?> " >
                          <input type="hidden" name="txttype" value=" <?php echo $centers[$n]['type']; ?> " >
                          <div>
                            <input type="submit" class="btn btn-default" name="accion" value="Select">
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
