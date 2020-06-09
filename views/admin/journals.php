<?php

  $centers_controller = new CentersController();

  $centers = $centers_controller->get();

  $doctors_controller = new DoctorsController();
    
  $doctors = $doctors_controller->get();

  $journas_controller = new JournalsController();

  $journals = $journas_controller->get();

  $accion = (isset($_POST['accion'])) ? $_POST['accion'] : "";

  $showmodal = false;
  $modalshow = false;
  $showmessage = false;
  $modaljournal = false;

  switch ($accion) {

      case 'new':

            $save_journal = array(

              'idjou' => $_POST['txtID'],
              'idoc' => $_POST['txtIDOC'],
              'day' => $_POST['txtDAY'],
              'idce' => $_POST['txtIDCE'],
              'hour_in' => $_POST['txtHOUR_IN'],
              'hour_out' => $_POST['txtHOUR_OUT'],
              'state' => $_POST['txtSTATE']
            );

            var_dump($save_journal);

           /* $journal = $journals_controller->set($save_journal);

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
                                        <a href="journasl" class="btn btn-default">Back</a>
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
                  ');*/         

      break;

      /*case 'btnupd':

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

      break;*/

           
      
  }

?>



<!-- central section -->
<div class="content-wrapper">
    
  <!-- content header (page header) -->
  <section class="content-header text-center">
    <div class="row">
      <h3><strong>Gestión de Agenda</strong></h3>
    </div>
  </section>
  <!-- fin content header (page header) -->



  <!-- Inicio modal profile -->
  <div class="row">
    <div class="col-xs-12">
      <form action="" method="post">
          <!-- Modal -->
          <div class="modal fade" id="journalmodal" tabindex="-1" role="dialog" aria-labelledby="user_modalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title text-center" id="user_modalLabel">Edición de Agenda</h5>
                  <div class="pull-right">
                    <button type="button" class="btn btn-default" data-dismiss="modal" aria-label="Close">Close</button>
                  </div>
                </div>
                <div class="modal-body">
                  <div class="form-row">
                    <div class="form-group col-md-12">
                      <label for="">Id</label>
                      <input type="text" class="form-control" name="txtID" placeholder="" id="txtID" value=" <?php echo $_POST['txtID']; ?> " disabled >
                      <input type="hidden" name="txtID" value="<?php echo $_POST['txtID']; ?>">
                      <br>
                    </div>
                    <div class="form-group col-md-6">
                      <label for="">Apellido</label>
                      <input type="text" class="form-control" name="txtLNAME" placeholder="" id="txtLNAME" value=" <?php echo $_POST['txtLNAME']; ?> " required>
                      <br>
                    </div>
                    <div class="form-group col-md-6">
                      <label for="">Nombre</label>
                      <input type="text" class="form-control" name="txtNAME" placeholder="" id="txtNAME" value=" <?php echo $_POST['txtNAME']; ?> " required>
                      <br>
                    </div>
                    <div class="form-group col-md-3">
                      <label for="">Roll</label>
                      <select class="form-control col-md-3" name="txtROLL" required>
                        <option value="<?php echo $_POST['txtROLL']; ?>"> <?php echo $_POST['txtROLL']; ?> </option>
                        <option value="dba">dba</option>
                        <option value="doc">doc</option>
                        <option value="aux">aux</option>
                      </select>
                    </div>
                    <div class="form-group col-md-9">
                      <label for="">Email</label>
                      <input type="email" class="form-control" name="txtMAIL" placeholder="" id="txtMAIL"  value=" <?php echo $_POST['txtMAIL']; ?> " required>
                      <br>
                    </div>
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
      </form>
    </div>
  </div>
  <!-- fin modal profile-->


  <section class="content">


    <!-- new registry for journals -->
    <div class="row">
        <div class="col-xs-10 col-xs-offset-1">
          <!-- /.box -->
          <div class="box">
            <!-- /.box-header -->
            <div class="box-body">
              <div id="tjournals_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                <div class="row">
                  <div class="col-sm-2">
                    <div class="dataTables_length" id="tjournals_length">
                      <div class="box-body">
                        <form method="post">
                          <input type="hidden" name="r" value="journal-add">
                          <input class="button btn btn-default" type="submit" value="New Registry">
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
                          <th class="text-center" aria-controls="tusers" rowspan="1" colspan="1" style=""><h5><strong>#</strong></h5></th>
                          <th class="text-center" aria-controls="tusers" rowspan="1" colspan="1" style=""><h5><strong>Profesionales</strong></h5></th>
                          <th class="text-center" aria-controls="tusers" rowspan="1" colspan="1" style=""><h5><strong>Especialidad</strong></h5></th>
                          <th class="text-center" aria-controls="tusers" rowspan="1" colspan="1" style=""><h5><strong>Centro</strong></h5></th>
                          <th class="text-center" aria-controls="tusers" rowspan="1" colspan="1" style=""><h5><strong>Horario</strong></h5></th>
                          <th class="text-center" aria-controls="tusers" rowspan="1" colspan="1" style=""><h5><strong>Estado</strong></h5></th>
                          <th class="text-center" aria-controls="tusers" rowspan="1" colspan="1" style=""><h5><strong>Actions</strong></h5></th>
                        </tr>
                      </thead>
                      <tbody>  
                        <?php for ($n=0; $n < count($journals); $n++) { ?>
                          <tr role="row" class="odd">
                            <td class="text-center"><h5> <?php echo $journals[$n]['idjou'] ?> </h5></td>
                            <td class="text-center"><h5> <?php echo ( $journals[$n]['lname'].', '.$journals[$n]['name'] ); ?> </h5></td>
                            <td class="text-center"><h5> <?php echo $journals[$n]['spec'] ?> </h5></td>
                            <td class="text-center"><h5> <?php echo $journals[$n]['cname'] ?> </h5></td>
                            <td class="text-center"><h5> <?php echo ( $journals[$n]['hour_in']. ' - '. $journals[$n]['hour_out'] ); ?> </h5></td>
                            <td class="text-center"><h5> <?php echo $journals[$n]['state'] ?> </h5></td>
                            <td class="text-center">
                              <form action="" method="post">
                                  <input type="hidden" name="txtID" value=" <?php echo $users[$n]['idus']; ?> " >
                                  <input type="hidden" name="txtLNAME" value=" <?php echo $users[$n]['lname']; ?> " >
                                  <input type="hidden" name="txtNAME" value=" <?php echo $users[$n]['name']; ?> " >
                                  <input type="hidden" name="txtMAIL" value=" <?php echo $users[$n]['mail']; ?> " >
                                  <input type="hidden" name="txtPASS" value=" <?php echo $users[$n]['pass']; ?> " >
                                  <input type="hidden" name="txtROLL" value=" <?php echo $users[$n]['roll']; ?> " >
                                  <div class="text-center">
                                    <input type="submit" class="btn btn-default" name="accion" value="Select">
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


  </section>


</div>
<!-- fin central section -->