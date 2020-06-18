<?php

  $specs_controller = new SpecsController();
  $specs = $specs_controller->get();

  $centers_controller = new CentersController();
  $centers = $centers_controller->get();

  $patients_controller = new PatientsController();
  $patients = $patients_controller->get();

  $accion = (isset($_POST['accion'])) ? $_POST['accion'] : "";

  $showmodal = $modalshow = $showmessage = $modaljournal = false;
    

  switch ($accion) {

    case 'Search':

          $patients_controller = new PatientsController();
          $patients = $patients_controller->get($_POST['DNI']);
          $rows = count ($patients);

          if ( $rows == 0 ) {

              $showmessage = true;

              print ('
                      <div class="row">
                        <div class="col-xs-12">
                          <form action="" method="post" >
                            <div class="modal fade" id="message" tabindex="-1" role="dialog" aria-labelledby="changepass_Label" aria-hidden="true">
                              <div class="modal-dialog modal-sm">
                                <div class="modal-content">
                                  <div class="modal-body">
                                    <div class="text-center">
                                      <h4 class="alert-heading">No Existe el Paciente!</h4>
                                    </div>
                                  </div>
                                  <div class="modal-footer">
                                    <div class="form-group col-md-12">
                                      <div class="pull-left">
                                        <a href="./" class="btn btn-default"><strong>CERRAR</strong></a>
                                      </div>
                                      <div class="pull-right">
                                        <a href="patients_assistant" name="r" value="patient_assistant-add" class="btn btn-primary"><strong>CREAR</strong></a>
                                      </div>
                                    </div>               
                                  </div>
                                </div>
                              </div>
                            </div>
                          </form>
                        </div>
                      </div>
              ');

          } elseif ( $rows == 1 ) {

              foreach ($patients as $key => $value) {
                  $$key = $value;
              }

              $idpa = $$key['idpa'];
              $lnamepa = $$key['lnamepa'];
              $namepa = $$key['namepa'];
              $dni = $$key['dni'];

              $showmessage = true; ?>

              <div class="row">
                <div class="col-xs-12">
                  <form action="" method="post">
                    <div class="modal fade" id="message" tabindex="-1" role="dialog" aria-labelledby="user_modalLabel" aria-hidden="true">
                      <div class="modal-dialog modal-sm">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h3 class="modal-title text-center" id="user_modalLabel"><font color="teal">Datos Paciente</font></h3>
                          </div>
                          <div class="modal-body">
                            <div class="form-row">
                              <div class="form-group col-md-12">
                                <label for=""><h4><strong>Dni</strong></h4></label>
                                <input type="text" class="form-control" value="<?php echo $dni ?>" disabled style="font-size: 20px;">
                              </div>
                              <div class="form-group col-md-12">
                                <label for=""><h4><strong>Apellido</strong></h4></label>
                                <input type="text" class="form-control" value="<?php echo $lnamepa ?>" disabled style="font-size: 20px;">
                              </div>
                              <div class="form-group col-md-12">
                                <label for=""><h4><strong>Nombres</strong></h4></label>
                                <input type="text" class="form-control" value="<?php echo $namepa ?>" disabled style="font-size: 20px;">
                                <br><br>
                              </div>
                              <br>
                            </div>
                          </div>

                          <div class="modal-footer">
                            <div class="form-group col-md-12">
                               <div class="pull-right">
                                <button type="button" class="btn btn-warning" data-dismiss="modal" aria-label="Close"><strong><font color="black">CERRAR</font></strong></button>
                              </div>
                              <div class="pull-left">
                                <a href="shifts_assistant" class="btn btn-info" name="accion"><strong>TURNOS</strong></a>
                              </div>
                            </div>               
                          </div>
                        </div>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
              
          <?php 
          } else {

              $showmessage = true;

              print ('
                        <div class="row">
                          <div class="col-xs-12">
                            <form action="" method="post" >
                              <div class="modal fade" id="message" tabindex="-1" role="dialog" aria-labelledby="changepass_Label" aria-hidden="true">
                                <div class="modal-dialog modal-sm">
                                  <div class="modal-content">
                                    <div class="modal-body">
                                      <div class="text-center">
                                        <h4 class="alert-heading">Debe ingresar N° de Documento!</h4>
                                      </div>
                                    </div>
                                    <div class="modal-footer">
                                      <div class="form-group col-md-12">
                                        <div class="text-center">
                                          <a href="./" class="btn btn-default"><strong>CERRAR</strong></a>
                                        </div>
                                      </div>               
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </form>
                          </div>
                        </div>
              ');

          }
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


    <!-- Inicio modal centros -->
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
    <!-- fin modal centros-->
    
    
    <div class="row">
      <div class="col-md-3 col-md-offset-1">
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">Busqueda de Paciente</h3>
            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse" ><i class="fa fa-minus"></i>
              </button>
            </div>
          </div>
          <div class="box-body">
            <form action="" method="post">
              <div class="form-group col-md-10 col-md-offset-1">
                <label for=""><h4><strong>Ingrese DNI</strong></h4></label>
                  <div class="input-group">
                    <input type="text" name="DNI" placeholder="Search...." class="form-control" style="font-size: 20px;">
                      <span class="input-group-btn">
                        <button type="submit" name="accion" value="Search" class="btn btn-primary"><strong>Buscar</strong></button>
                      </span>
                  </div>
              </div>
            </form>
          </div>
        </div>
      </div>
      <div class="col-md-3">
        <div class="box box-success collapsed-box">
          <div class="box-header with-border">
            <h3 class="box-title">Profesionales</h3>
            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
              </button>
            </div>
          </div>
          <div class="box-body text-center">
            <h1 style="color: orange;">Working on it.</h1>
          </div>
          <!-- /.box-body -->
        </div>
      </div>
      <div class="col-md-2">
        <div class="box box-info collapsed-box">
          <div class="box-header with-border">
            <h3 class="box-title">Especialidades</h3>
            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
              </button>
            </div>
          </div>
          <div class="box-body">
            <table >
                <?php for ($n=0; $n < count($specs); $n++) { ?>
                <tr>
                  <td class="text-center"><h4><?php echo $specs[$n]['idspec']; ?> &nbsp;&nbsp;</h4></td>
                  <td><h4><?php echo $specs[$n]['spec']; ?></h4></td>
                </tr>
                <?php } ?> 
            </table>
          </div>
          <!-- /.box-body -->
        </div>
      </div>
      <div class="col-md-2">  
        <div class="box box-warning ">
          <form action="" method="post">
            <div class="box-header with-border">
              <h3 class="box-title">Centros</h3>
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="box-body">
              <h4>
                <select class="form-control" id="search1" name="txtcenter">
                  <option>Search...</option>
                  <?php for ($n=1; $n < count($centers); $n++) { ?>
                  <option><?php echo $centers[$n]['cname'] ?></option>
                  <?php } ?> 
                </select>
              </h4>
            </div>
            <div class="box-footer">
              <div class="pull-right">
                <button type="submit" class="btn bg-orange btn-sm" name="accion" value="Centro" style="font-size: 12px; color: black;"><strong>BUSCAR</strong></button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
      

  </section>
  

</div>