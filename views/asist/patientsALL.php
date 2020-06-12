<?php 

  $patients_controller = new PatientsController();

  $patients = $patients_controller->get();

  $accion = (isset($_POST['accion'])) ? $_POST['accion'] : "";

  $modalpatient = $showmodal = $modalshow = $showmessage = $modaljournal = false;
  

  switch ($accion) {

    case 'Guardar':

          $modalpatient = true;

          $save_patient = array(

                      'idpa' => intval($_POST['idpa']),
                      'dni' => $_POST['dni'],
                      'lname' => $_POST['lname'],
                      'name' => $_POST['name'],
                      'age' => intval($_POST['age']),
                      'mail' => $_POST['mail'],
                      'direction' => $_POST['direction'],
                      'city' => $_POST['city'],
                      'telphone' => $_POST['telphone'],
                      'sex' => $_POST['sex'],
                      'blood' => $_POST['blood']
          );

          var_dump($save_patient);

          $patient = $patients_controller->set($save_patient);

          /*print ('
                  <!-- modal message-->
                  <div class="row">
                    <div class="col-xs-12">
                      <form action="" method="post" >
                        <!-- Modal -->
                        <div class="modal fade" id="patient" tabindex="-1" role="dialog" aria-labelledby="changepass_Label" aria-hidden="true">
                          <div class="modal-dialog modal-sm">
                            <div class="modal-content">
                              <div class="modal-body">
                                <div class="text-center">
                                  <h4 class="alert-heading"> Actualizacion de Paciente Completa</h4>
                                </div>
                              </div>
                              <div class="modal-footer">
                                <div class="form-group col-md-12">
                                  <div class="row">
                                    <div class="text-center">
                                      <a href="patients" class="btn btn-default">Back</a>
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
    
  }


          
  

 
   
?>

<!-- central section -->
<div class="content-wrapper">

    
  <!-- content header -->
  <section class="content-header text-center">
    <div class="row" style="margin-top: -10px; margin-bottom: -10px">
      <h3><strong>Pacientes</strong></h3>
    </div>
  </section>
  <!-- fin content header -->


  <!-- main content -->
  <section class="content">


    <div class="row">
          <div class="col-md-6">


            <div class="box box-info">
              <div class="box-header with-border">
                  <div class="box-body">
                    <h3 class="box-title">Busqueda de Paciente</h3>
                    <div class="pull-right">
                      <form method="post">
                        <input type="hidden" name="r" value="patient-add">
                        <input class="button btn bg-purple" type="submit" value="Agregar"> 
                      </form>
                    </div>
                  </div>
                  <div class="box-body">
                    <table class="table table-bordered" id="datatablepa">
                      <thead>
                        <tr role="row">
                            <th class="text-center" colspan="1" style="width: 30px"><h4><strong>Dni</strong></h4></th>
                            <th class="text-center" colspan="1" style="width: 100px"><h4><strong>Apellido</strong></h4></th>
                            <th class="text-center" colspan="1" style="width: 50px"><h4><strong>Nombres</strong></h4></th>
                            <th class="text-center" colspan="1" style="width: 50px"><h4><strong>Paciente N°</strong></h4></th>
                            <th class="text-center" colspan="1" style="width: 30px"><h4><strong>Action</strong></h4></th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php for ($n=0; $n < count($patients); $n++) { ?>
                        <tr role="row">
                          <td class="text-center" ><h5> <?php echo $patients[$n]['dni']; ?> </h5></td>
                          <td class="text-center" ><h5> <?php echo $patients[$n]['lname']; ?> </h5></td> 
                          <td class="text-center" ><h5> <?php echo $patients[$n]['name']; ?> </h5></td>
                          <td class="text-center" ><h5> <?php echo $patients[$n]['idpa']; ?> </h5></td>
                          <td class="text-center">
                            <form action="" method="post">
                              <input type="hidden" name="txtidpa" value="<?php echo $patients[$n]['idpa']; ?>" >
                              <input type="hidden" name="txtdni" value="<?php echo $patients[$n]['dni']; ?>" >
                              <input type="hidden" name="txtlname" value="<?php echo $patients[$n]['lname']; ?>" >
                              <input type="hidden" name="txtname" value="<?php echo $patients[$n]['name']; ?>" >
                              <input type="hidden" name="txtage" value="<?php echo $patients[$n]['age']; ?>" >
                              <input type="hidden" name="txtmail" value="<?php echo $patients[$n]['mail']; ?>" >
                              <input type="hidden" name="txtdirection" value="<?php echo $patients[$n]['direction']; ?>" >
                              <input type="hidden" name="txtcity" value="<?php echo $patients[$n]['city']; ?>" >
                              <input type="hidden" name="txttelphone" value="<?php echo $patients[$n]['telphone']; ?>" >
                              <input type="hidden" name="txtsex" value="<?php echo $patients[$n]['sex']; ?>" >
                              <input type="hidden" name="txtblood" value="<?php echo $patients[$n]['blood']; ?>" >

                              <div>
                                <input type="submit" class="btn btn-default" name="accion" value="Select" id="search">
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


            <div class="box box-info">
              <div class="box-header with-border">
                <div class="box-body">
                <h3 class="box-title">Datos del Paciente</h3>
              </div>
              <form role="form" id="myForm"  method="post">
                <div class="box-body">
                  <div class="form-group col-md-10 col-md-offset-1">
                    <label for="idpa">N° de Paciente</label>
                    <input type="text" class="form-control" name="idpa" value="<?php echo ( (isset($_POST['txtidpa'])) ? $_POST['txtidpa'] : "" ); ?>" required disabled >
                    <input type="hidden" class="form-control" name="idpa" value="<?php echo ( (isset($_POST['txtidpa'])) ? $_POST['txtidpa'] : "" ); ?>">

                  </div>
                  <div class="form-group col-md-4 col-md-offset-1">
                    <label for="lname">Apellido</label>
                    <input type="text" class="form-control" id="submit" name="lname" value="<?php echo ( (isset($_POST['txtlname'])) ? $_POST['txtlname'] : "" ); ?>" required disabled >
                  </div>
                  <div class="form-group col-md-4">
                    <label for="exampleInputFile">Nombres</label>
                    <input type="text" class="form-control" id="submit" name="name" value="<?php echo ( (isset($_POST['txtname'])) ? $_POST['txtname'] : "" ); ?>" required disabled >
                  </div>
                  <div class="form-group col-md-2">
                    <label for="dni">Dni</label>
                    <input type="text" class="form-control" id="submit" name="dni" value="<?php echo ( (isset($_POST['txtdni'])) ? $_POST['txtdni'] : "" ); ?>" required disabled >
                  </div>
                  <div class="form-group col-md-2 col-md-offset-1">
                    <label for="age">Edad</label>
                    <input type="text" class="form-control" id="submit" name="age" value="<?php echo ( (isset($_POST['txtage'])) ? $_POST['txtage'] : "" ); ?>" required disabled >
                  </div>
                  <div class="form-group col-md-2">
                    <label for="sex">Sexo</label>
                    <select class="form-control" name="sex" style="" id="submit" required disabled>
                        <option value="<?php echo ( (isset($_POST['txtsex'])) ? $_POST['txtsex'] : "" ); ?>"><?php echo ( (isset($_POST['txtsex'])) ? $_POST['txtsex'] : "" ); ?></option>
                        <option value="F">F</option>
                        <option value="M">M</option>
                    </select>
                  </div>
                  <div class="form-group col-md-2">
                    <label for="blood">Factor</label>
                    <select class="form-control" name="blood" style="" id="submit" required disabled>
                        <option value="<?php echo ( (isset($_POST['txtblood'])) ? $_POST['txtblood'] : "" ); ?>"><?php echo ( (isset($_POST['txtblood'])) ? $_POST['txtblood'] : "" ); ?></option>
                        <option value="0-">0-</option>
                        <option value="0+">0+</option>
                        <option value="A-">A-</option>
                        <option value="A+">A+</option>
                        <option value="B-">B-</option>
                        <option value="B+">B+</option>
                        <option value="AB-">AB-</option>
                        <option value="AB+">AB+</option>
                    </select>
                  </div>
                  <div class="form-group col-md-4">
                    <label for="telphone">Teléfono</label>
                    <input type="text" class="form-control" id="submit" name="telphone" value="<?php echo ( (isset($_POST['txttelphone'])) ? $_POST['txttelphone'] : "" ); ?>" required disabled >
                  </div>
                  <div class="form-group col-md-3 col-md-offset-1">
                    <label for="direction">Dirección</label>
                    <input type="text" class="form-control" id="submit" name="direction" value="<?php echo ( (isset($_POST['txtdirection'])) ? $_POST['txtdirection'] : "" ); ?>" required disabled>
                  </div>
                  <div class="form-group col-md-3">
                    <label for="city">Ciudad</label>
                    <input type="text" class="form-control" id="submit" name="city" value="<?php echo ( (isset($_POST['txtcity'])) ? $_POST['txtcity'] : "" ); ?>" required disabled>
                  </div>
                  <div class="form-group col-md-4 ">
                    <label for="mail">Correo</label>
                    <input type="mail" class="form-control" id="submit" name="mail" value="<?php echo ( (isset($_POST['txtmail'])) ? $_POST['txtmail'] : "" ); ?>" required disabled>
                  </div>
                </div>
                <div class="box-footer">
                  <input type="checkbox" name="checkbox" id="checkbox" class="chkAgree"><strong> &nbsp; &nbsp; Desea editar Paciente?</strong>
                  <div class="pull-right">
                    <a href="patients" class="btn btn-default">Cancelar</a>
                    <!--<input type="reset" href="patients" class="btn btn-default" name="accion" value="Cancelar">-->
                    <input value="Guardar" type="submit" class="btn btn-success" name="accion" id="submit" disabled>
                  </div>
                </div>
              </form>
            </div>





          </div>
    </div>

    <div class="row">
        <!-- left column -->
        <div class="col-md-4 col-md-offset-1">
          <!-- general form elements -->
          <div class="box box-purple">
            <div class="box-header with-border" style="text-align: center;">
              <h3 class="box-title">Nuevo Paciente</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form">
              <div class="box-body">
                <div class="form-group col-md-10 col-md-offset-1">
                  <label for="">Ingrese DNI</label>
                  <input type="text" class="form-control" id="" placeholder="dni">
                </div>
                <div class="form-group col-md-10 col-md-offset-1">
                  <label for="">Ingrese APELLIDOS</label>
                  <input type="text" class="form-control" id="" placeholder="apellido">
                </div>
                <div class="form-group col-md-10 col-md-offset-1">
                  <label for="">Ingrese NOMBRES</label>
                  <input type="text" class="form-control" id="" placeholder="dni">
                </div>
                <div class="form-group col-md-4 col-md-offset-1">
                  <label for="">Elija SEXO</label>
                  <select class="form-control" name="sex" style="" required >
                        <option value="F">F</option>
                        <option value="M">M</option>
                    </select>
                </div>
                <div class="form-group col-md-6 ">
                  <label for="">Ingrese DIRECCIÓN</label>
                  <input type="text" class="form-control" id="" placeholder="dni">
                </div>
                <div class="form-group col-md-10 col-md-offset-1">
                  <label for="">Ingrese CIUDAD</label>
                  <input type="text" class="form-control" id="" placeholder="dni">
                </div>
                <div class="form-group col-md-10 col-md-offset-1">
                  <label for="">Ingrese TELÉFONO/label>
                  <input type="text" class="form-control" id="" placeholder="dni">
                </div>
                <div class="form-group col-md-3 col-md-offset-1">
                  <label for="">Ingrese EDAD</label>
                  <input type="text" class="form-control" id="" placeholder="dni">
                </div>
                
                <div class="form-group col-md-6 col-md-offset-1">
                  <label for="">Elija GRUPO SANGUÍNEO</label>
                  <select class="form-control" name="blood" style="" required >
                        <option value="0-">0-</option>
                        <option value="0+">0+</option>
                        <option value="A-">A-</option>
                        <option value="A+">A+</option>
                        <option value="B-">B-</option>
                        <option value="B+">B+</option>
                        <option value="AB-">AB-</option>
                        <option value="AB+">AB+</option>
                    </select>
                </div>
                
                <div class="form-group">
                  <label for="exampleInputFile">File input</label>
                  <input type="file" id="exampleInputFile">

                  <p class="help-block">Example block-level help text here.</p>
                </div>
                <div class="checkbox">
                  <label>
                    <input type="checkbox"> Check me out
                  </label>
                </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
          </div>


        </div>
    </div>

    
  
    
  
  
  </section>
  <!-- fin main content -->


</div>
<!-- fin central section -->