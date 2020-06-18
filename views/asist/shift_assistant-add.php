<?php

  $specs_controller = new SpecsController();
  $specs = $specs_controller->get();

  /*$centers_controller = new CentersController();
  $centers = $centers_controller->get();

  $patients_controller = new PatientsController();
  $patients = $patients_controller->get();*/

  $accion = (isset($_POST['accion'])) ? $_POST['accion'] : "";

  $showmodal = $modalshow = $showmessage = $modaljournal = false;
    

  $accion = (isset($_POST['accion'])) ? $_POST['accion'] : "";

  $showmodal = $modalshow = $showmessage = $modaljournal = false;
    

  switch ($accion) {

    case 'select':

          //print_r($_POST);

          $showmessage = true;

          $idspec = intval( $_POST['txtspec'] );

          $journals_controller = new JournalsController();
          $journal = $journals_controller->get($idspec);

          //var_dump($journal);
          ?>


                  <!-- modal message-->
                  <div class="row">
                    <div class="col-xs-12">
                      <form action="" method="post" >
                        <!-- Modal -->
                        <div class="modal fade" id="message" tabindex="-1" role="dialog" aria-labelledby="changepass_Label" aria-hidden="true">
                          <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h3 class="modal-title text-center" id="user_modalLabel">Profesionales de: <?php print_r( $_POST['txtspec'] );  ?></h3>
                                <div class="pull-right">
                                  <button type="button" class="btn btn-default btn-sm" data-dismiss="modal" aria-label="Close">CERRAR</button>
                                </div>
                              </div>
                              <div class="modal-body">
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
                                              <th class="text-center" aria-controls="tusers" rowspan="1" colspan="1" ><h4><strong>Apellido</strong></h4></th>
                                              <th class="text-center" aria-controls="tusers" rowspan="1" colspan="1" ><h4><strong>Nombre</strong></h4></th>
                                              <th class="text-center" aria-controls="tusers" rowspan="1" colspan="1" ><h4><strong>Centro</strong></h4></th>
                                              <th class="text-center" aria-controls="tusers" rowspan="1" colspan="1" ><h4><strong>Día</strong></h4></th>
                                              <th class="text-center" aria-controls="tusers" rowspan="1" colspan="1" ><h4><strong>Entrada</strong></h4></th>
                                              <th class="text-center" aria-controls="tusers" rowspan="1" colspan="1" ><h4><strong>Salida</strong></h4></th>
                                              <th class="text-center" aria-controls="tusers" rowspan="1" colspan="1" ><h4><strong>Elección</strong></h4></th>
                                            </tr>
                                          </thead>
                                          <tbody>  
                                            <?php for ($n=0; $n < count($journal); $n++) { ?>
                                              <tr role="row" class="odd">
                                                <td class="text-center"><h4><?php echo $journal[$n]['lname'] ?></h4></td>
                                                <td class="text-center"><h4><?php echo $journal[$n]['name'] ?></h4></td>
                                                <td class="text-center"><h4><?php echo $journal[$n]['cname'] ?></h4></td>
                                                <td class="text-center"><h4><?php echo $journal[$n]['day'] ?></h4></td>
                                                <td class="text-center"><h4><?php echo $journal[$n]['hour_in'] ?></h4></td>
                                                <td class="text-center"><h4><?php echo $journal[$n]['hour_out'] ?></h4></td>
                                                <td class="text-center">
                                                  <form action="" method="post">
                                                      <input type="hidden" name="txtID" value="<?php echo $journal[$n]['idjou']; ?>" >
                                                      <input type="hidden" name="txtLNAME" value="<?php echo $journal[$n]['lname']; ?>" >
                                                      <input type="hidden" name="txtNAME" value="<?php echo $journal[$n]['name']; ?>" >
                                                      <input type="hidden" name="txtMAIL" value="<?php echo $journal[$n]['cname']; ?>" >
                                                      <input type="hidden" name="txtMAIL" value="<?php echo $journal[$n]['idspec']; ?>" >
                                                      <input type="hidden" name="txtPASS" value="<?php echo $journal[$n]['day']; ?>" >
                                                      <input type="hidden" name="txtPASS" value="<?php echo $journal[$n]['hour_in']; ?>" >
                                                      <input type="hidden" name="txtPASS" value="<?php echo $journal[$n]['hour_out']; ?>" >
                                                      <input type="hidden" name="txtROLL" value="<?php echo $journal[$n]['state']; ?>" >
                                                      <div>
                                                        <input type="submit" class="btn bg-orange btn-sm" name="accion" value="Select" textarea="black" >
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
                  <!-- fin modal message-->
                        
    <?php  
    break;    
      
  }

?>

<!-- Central section -->
<div class="content-wrapper">

   <!-- content header -->
  <section class="content-header text-center">
    <div class="row">
      <br><h1><strong style="color: teal;">eturnos</strong></h1> <h3>Sistema integral de turnos</h3><br>
    </div>
  </section>
  <!-- fin content header -->

  

  <section class="content">
    <div class="row">
      <div class="col-md-3" style="margin-left: 100px;">
        <div class="box box-warning collapsed-box">
          <div class="box-header with-border">
            <h3 class="box-title">Especialidad</h3>
            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
              </button>
            </div>
          </div>
          <div class="box-body">
            <form action="" method="post">
              <div class="input-group">
                <h4><select class="" id="search2" name="txtspec" required>
                    <?php for ($n=0; $n < count($specs); $n++) { ?>
                    <option><?php echo ($specs[$n]['idspec'].'_'.$specs[$n]['spec']); ?></option>
                    <?php } ?>
                </select></h4>
                <span class="input-group-btn">
                  <button value="select" type="submit" class="btn btn-info btn-xs" name="accion">Buscar</button>
                  <input type="hidden" name="r" value="shift_assistant-add">
                </span>
              </div>
            </form>  
            
          </div>
        </div>
      </div>
    </div>
   </section>
</div>