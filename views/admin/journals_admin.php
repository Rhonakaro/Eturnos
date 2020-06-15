<?php

  $centers_controller = new CentersController();

  $centers = $centers_controller->get();

  $journals_controller = new JournalsController();

  $journals = $journals_controller->get();

  $accion = (isset($_POST['accion'])) ? $_POST['accion'] : "";

  $showmodal = $modalshow = $showmessage = $modaljournal = false;
  
 

  switch ($accion) {

      case 'btnupd':

            $showmessage = true;

            $save_journal = array(

              'idjou' => $_POST['txtIDJOU'],
              'day' => $_POST['txtDAY'],
              'idce' => intval($_POST['txtIDCE']),
              'hour_in' => $_POST['txtHOUR_IN'],
              'hour_out' => $_POST['txtHOUR_OUT'],
              'state' => $_POST['txtSTATE']
            );

            $journal = $journals_controller->journalupd($save_journal);

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
                                        <a href="journals_admin" class="btn btn-default">ATARS</a>
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
             
            $journal = $journals_controller->del($_POST['txtIDJOU']);

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
                                      <a href="journals_admin" class="btn btn-default"><strong>ATRAS</strong></a>
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

            $modaljournal = true;

      break;
  }

?>



<!-- central section -->
<div class="content-wrapper">
    
  <!-- content header (page header) -->
  <section class="content-header text-center">
    <div class="row">
      <br><h3><strong>Gestión de Agenda</strong></h3><br>
    </div>
  </section>
  <!-- fin content header (page header) -->

  
  <!-- main content -->
  <section class="content">


    <!-- Inicio modal profile -->
    <div class="row">
        <div class="col-xs-12">
          <form action="" method="post">
            <!-- Modal -->
            <div class="modal fade" id="journalmodal" tabindex="-1" role="dialog" aria-labelledby="journal_modalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h4 class="modal-title text-center" id="modal_modalLabel"><strong>Modificación de Agennda de Profesionales</strong></h4>
                    <div class="pull-right">
                      <button type="button" class="btn btn-default" data-dismiss="modal" aria-label="Close">CERRAR</button>
                    </div>
                  </div>
                  <div class="modal-body">
                      <div class="form-group col-md-8">
                        <label for=""><h4><strong>Id</strong></h4></label>
                        <input type="text" class="form-control" name="txtIDJOU" value="<?php echo $_POST['txtidjou']; ?>" disabled style="font-size: 20px;">
                        <input type="hidden" name="txtIDJOU" value="<?php echo $_POST['txtidjou']; ?>">
                      </div>
                      <div class="form-group col-md-6">
                        <label for=""><h4><strong>Profesional</strong></h4></label>
                        <input type="text" class="form-control" value="<?php echo ( $_POST['txtlname']. ', '.$_POST['txtname'] ); ?>" disabled style="font-size: 20px;">
                        <input type="hidden" name="txtLNAME" value="<?php echo $_POST['txtlname']; ?>">
                        <input type="hidden" name="txtNAME" value="<?php echo $_POST['txtname']; ?>">
                      </div>
                      <div class="form-group col-md-6">
                        <label for=""><h4><strong>Especialidad</strong></h4></label>
                        <input type="text" class="form-control" name="txtSPEC" value="<?php echo $_POST['txtspec']; ?>" disabled style="font-size: 20px;">
                      </div>
                      <div class="form-group col-md-6">
                        <label for=""><h4><strong>Día</strong></h4></label>
                        <select class="form-control col-md-6" name="txtDAY" required style="font-size: 20px; padding-bottom: 0px">
                          <option value="<?php echo $_POST['txtday']; ?>" style="font-size: 20px;"><?php echo $_POST['txtday']; ?></option>
                          <option value="Lunes" style="font-size: 20px;">Lunes</option>
                          <option value="Martes" style="font-size: 20px;">Martes</option>
                          <option value="Miércoles" style="font-size: 20px;">Miércoles</option>
                          <option value="Jueves" style="font-size: 20px;">Jueves</option>
                          <option value="Viernes" style="font-size: 20px;">Viernes</option>
                        </select>
                      </div>
                      <div class="form-group col-md-6">
                        <label for=""><h4><strong>Centro</strong></h4></label>
                        <select class="form-control" name="txtIDCE" required style="font-size: 20px; padding-bottom: 0px">
                          <option value="<?php echo $_POST['txtcname']; ?>" style="font-size: 20px;"><?php echo $_POST['txtcname']; ?></option>
                          <?php for ($n=1; $n < count($centers); $n++) { ?>
                          <option style="font-size: 20px;"><?php echo ($centers[$n]['idce'] .'_'.$centers[$n]['cname']) ?></option>
                          <?php } ?> 
                        </select>
                      </div>
                      <div class="form-group col-md-3">
                        <label for=""><h4><strong>Entrada</strong></h4></label>
                        <select class="form-control col-md-3" name="txtHOUR_IN" required style="font-size: 20px; padding-bottom: 0px">
                          <option value="<?php echo $_POST['txthour_in']; ?>"><?php echo $_POST['txthour_in']; ?></option>
                          <option value="07 am." style="font-size: 20px;">07 am.</option>
                          <option value="08 am." style="font-size: 20px;">08 am.</option>
                          <option value="09 am." style="font-size: 20px;">09 am.</option>
                          <option value="10 am." style="font-size: 20px;">10 am.</option>
                          <option value="11 am." style="font-size: 20px;">11 am.</option>
                          <option value="12 m." style="font-size: 20px;">12 m.</option>
                          <option value="13 pm." style="font-size: 20px;">13 pm.</option>
                          <option value="14 pm." style="font-size: 20px;">14 pm.</option>
                          <option value="15 pm." style="font-size: 20px;">15 pm.</option>
                          <option value="16 pm." style="font-size: 20px;">16 pm.</option>
                          <option value="17 pm." style="font-size: 20px;">17 pm.</option>
                          <option value="18 pm." style="font-size: 20px;">18 pm.</option>
                        </select>
                      </div>
                      <div class="form-group col-md-3">
                        <label for=""><h4><strong>Salida</strong></h4></label>
                        <select class="form-control col-md-3" name="txtHOUR_OUT" required style="font-size: 20px; padding-bottom: 0px">
                          <option value="<?php echo $_POST['txthour_out']; ?>"><?php echo $_POST['txthour_out']; ?></option>
                          <option value="08 am." style="font-size: 20px;">08 am.</option>
                          <option value="09 am." style="font-size: 20px;">09 am.</option>
                          <option value="10 am." style="font-size: 20px;">10 am.</option>
                          <option value="11 am." style="font-size: 20px;">11 am.</option>
                          <option value="12 m." style="font-size: 20px;">12 m.</option>
                          <option value="13 pm." style="font-size: 20px;">13 pm.</option>
                          <option value="14 pm." style="font-size: 20px;">14 pm.</option>
                          <option value="15 pm." style="font-size: 20px;">15 pm.</option>
                          <option value="16 pm." style="font-size: 20px;">16 pm.</option>
                          <option value="17 pm." style="font-size: 20px;">17 pm.</option>
                          <option value="18 pm." style="font-size: 20px;">18 pm.</option>
                          <option value="19 pm." style="font-size: 20px;">19 pm.</option>
                        </select>
                      </div>
                      <div class="form-group col-md-5 col-md-offset-1">
                        <label for=""><h4><strong>Estado</strong></h4></label>
                        <select class="form-control col-md-5" name="txtSTATE" required style="font-size: 20px; padding-bottom: 0px">
                          <option value="<?php echo $_POST['txtstate']; ?>" style="font-size: 20px;"><?php echo $_POST['txtstate']; ?></option>
                          <option value="Up" style="font-size: 20px;">Up</option>
                          <option value="Down" style="font-size: 20px;">Down</option>
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
          </form>
        </div>
    </div>
    <!-- fin modal profile-->


    <!-- new registry for journals -->
    <div class="row">
        <div class="col-xs-10 col-xs-offset-1">
          <!-- /.box -->
          <div class="box box-info">
            <!-- /.box-header -->
            <div class="box-body">
              <div id="tjournals_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                <div class="row">
                  <div class="col-sm-2">
                    <div class="dataTables_length" id="tjournals_length">
                      <div class="box-body">
                        <form method="post">
                          <input type="hidden" name="r" value="journal_admin-add">
                          <input class="button btn bg-purple" type="submit" value="NUEVO" >
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-12">
                    <table id="datatable" class="table table-hover table-bordered dataTable" role="grid" aria-describedby="tjournals_info">
                      <thead>
                        <tr role="row">
                          <th class="text-center" aria-controls="tusers" rowspan="1" colspan="1" ><h4><strong>#</strong></h4></th>
                          <th class="text-center" aria-controls="tusers" rowspan="1" colspan="1" ><h4><strong>Profesionales</strong></h4></th>
                          <th class="text-center" aria-controls="tusers" rowspan="1" colspan="1" ><h4><strong>Especialidad</strong></h4></th>
                          <th class="text-center" aria-controls="tusers" rowspan="1" colspan="1" ><h4><strong>Día</strong></h4></th>
                          <th class="text-center" aria-controls="tusers" rowspan="1" colspan="1" ><h4><strong>Centro</strong></h4></th>
                          <th class="text-center" aria-controls="tusers" rowspan="1" colspan="1" ><h4><strong>Horario</strong></h4></th>
                          <th class="text-center" aria-controls="tusers" rowspan="1" colspan="1" ><h4><strong>Estado</strong></h4></th>
                          <th class="text-center" aria-controls="tusers" rowspan="1" colspan="1" ><h4><strong>Acción</strong></h4></th>
                        </tr>
                      </thead>
                      <tbody>  
                        <?php for ($n=0; $n < count($journals); $n++) { ?>
                          <tr role="row" class="odd">
                            <td class="text-center"><h4><?php echo $journals[$n]['idjou'] ?></h4></td>
                            <td class="text-center"><h4><?php echo ( $journals[$n]['lname'].', '.$journals[$n]['name'] ); ?></h4></td>
                            <td class="text-center"><h4><?php echo $journals[$n]['spec'] ?></h4></td>
                            <td class="text-center"><h4><?php echo $journals[$n]['day'] ?></h4></td>
                            <td class="text-center"><h4><?php echo $journals[$n]['cname'] ?></h4></td>
                            <td class="text-center"><h4><?php echo ( $journals[$n]['hour_in']. ' - '. $journals[$n]['hour_out'] ); ?></h4></td>
                            <td class="text-center"><h4><?php echo $journals[$n]['state'] ?></h4></td>
                            <td class="text-center">
                              <form action="" method="post">
                                  <input type="hidden" name="txtidjou" value="<?php echo $journals[$n]['idjou']; ?>">
                                  <input type="hidden" name="txtlname" value="<?php echo $journals[$n]['lname']; ?>">
                                  <input type="hidden" name="txtname" value="<?php echo $journals[$n]['name']; ?>">
                                  <input type="hidden" name="txtspec" value="<?php echo $journals[$n]['spec']; ?>">
                                  <input type="hidden" name="txtday" value="<?php echo $journals[$n]['day']; ?>">
                                  <input type="hidden" name="txtcname" value="<?php echo $journals[$n]['cname']; ?>">
                                  <input type="hidden" name="txthour_in" value="<?php echo $journals[$n]['hour_in']; ?>">
                                  <input type="hidden" name="txthour_out" value="<?php echo $journals[$n]['hour_out']; ?>">
                                  <input type="hidden" name="txtstate" value="<?php echo $journals[$n]['state']; ?>">
                                  <div class="text-center">
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
    </div>
    <!-- fin new registry for journals -->


  </section>
  <!-- fin main content -->


</div>
<!-- fin central section -->