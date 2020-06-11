<?php
  

  $specs_controller = new SpecsController();

  $specs = $specs_controller->get();

  $accion = (isset($_POST['accion'])) ? $_POST['accion'] : "";

  $modaljournal = false;
  $showmodal = false;
  $modalshow = false;
  $showmessage = false;
  
 
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
                                  <h4 class="alert-heading"> Successful Action</h4>
                                </div>
                              </div>
                              <div class="modal-footer">
                                <div class="form-group col-md-12">
                                  <div class="row">
                                    <div class="text-center">
                                      <a href="specs" class="btn btn-default">Back</a>
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
                                  <h4 class="alert-heading"> Successful Action</h4>
                                </div>
                              </div>
                              <div class="modal-footer">
                                <div class="form-group col-md-12">
                                  <div class="row">
                                    <div class="text-center">
                                      <a href="specs" class="btn btn-default">Back</a>
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
      <h3><strong>Gestión de Especialidades</strong></h3>
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
                  <h5 class="modal-title text-center" id="modalLabel">Edición de Especialidad</h5>
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
                    <div class="form-group col-md-10">
                      <label for="">Especialidad</label>
                      <input type="text" class="form-control" name="txtspec" placeholder="" id="txtspec" value=" <?php echo $_POST['txtspec']; ?> " required >
                      <br>
                    </div>
                    <div class="form-group col-md-2">
                      <label for="">Tiempo</label>
                      <input type="text" class="form-control" name="txtsptime" placeholder="" id="txtsptime" value=" <?php echo $_POST['txtsptime']; ?> " required >
                      <br>
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
              <div class="box-header with-border">
                 <div class="box-body">
                    <form method="post">
                        <input type="hidden" name="r" value="spec-add">
                        <input class="button btn btn-warning" type="submit" value="New Spec">
                    </form>
                  </div>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                <table class="table table-bordered" id="datatable">
                  <thead>
                    <tr role="row">
                        <th class="text-center" colspan="1" style="width: 30px"><h4><strong>#</strong></h4></th>
                        <th class="text-center" colspan="1" style="width: 140px"><h4><strong>Especialidad</strong></h4></th>
                        <th class="text-center" colspan="1" style="width: 50px"><h4><strong>Tiempo</strong></h4></th>
                        <th class="text-center" colspan="1" style="width: 30px"><h4><strong>Action</strong></h4></th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php for ($n=0; $n < count($specs); $n++) { ?>
                    <tr role="row">
                      <td class="text-center"><h4> <?php echo $specs[$n]['idspec']; ?> </h4></td>
                      <td class="text-center"><h4> <?php echo $specs[$n]['spec']; ?> </h4></td> 
                      <td class="text-center"><h4> <?php echo $specs[$n]['sptime']; ?> </h4></td>
                      <td class="text-center">
                        <form action="" method="post">
                          <input type="hidden" name="txtid" value=" <?php echo $specs[$n]['idspec']; ?> " >
                          <input type="hidden" name="txtspec" value=" <?php echo $specs[$n]['spec']; ?> " >
                          <input type="hidden" name="txtsptime" value=" <?php echo $specs[$n]['sptime']; ?> " >
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
