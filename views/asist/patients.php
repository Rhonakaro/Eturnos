<?php 

  $patients_controller = new PatientsController();

  $patients = $patients_controller->get();

  $accion = (isset($_POST['accion'])) ? $_POST['accion'] : "";

  
  $accionEdit = $accionSave = $accionCancel = "disabled";

  $showmodal = $modalshow = $showmessage = $modaljournal = false;
  

  switch ($accion) {

    case 'Editar':

          $accionSave = $accionCancel = "";
          $accionEdit = "disabled";
          


    break;


    case 'Select':

          $accionEdit = "";
          $accionSave = $accionCancel = "";

          print_r($_POST);

    break;
  }


          
  

 
   
?>

<!-- central section -->
<div class="content-wrapper">

    
  <!-- content header -->
  <section class="content-header text-center">
    <div class="row">
      <h3><strong>Pacientes</strong></h3>
    </div>
  </section>
  <!-- fin content header -->


  <!-- main content -->
  <section class="content">


    <div class="row">
          <div class="col-md-6">
            <div class="box">
              <div class="box-header with-border">
                 <div class="box-body">
                    <h3 class="box-title">Busqueda de Paciente</h3>
                    <div class="pull-right">
                    <form method="post">
                      <input type="hidden" name="r" value="patient-add">
                      <input class="button btn btn-warning" type="submit" value="Agregar" style="color: black">
                    </form>
                  </div>
                  </div>
                  
              </div>
              <!-- /.box-header -->
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
                          <input type="hidden" name="txtidpa" value=" <?php echo $patients[$n]['idpa']; ?> " >
                          <input type="hidden" name="txtdni" value=" <?php echo $patients[$n]['dni']; ?> " >
                          <input type="hidden" name="txtlname" value=" <?php echo $patients[$n]['lname']; ?> " >
                          <input type="hidden" name="txtname" value=" <?php echo $patients[$n]['name']; ?> " >
                          <input type="hidden" name="txtage" value=" <?php echo $patients[$n]['age']; ?> " >
                          <input type="hidden" name="txtmail" value=" <?php echo $patients[$n]['mail']; ?> " >
                          <input type="hidden" name="txtdirection" value=" <?php echo $patients[$n]['direction']; ?> " >
                          <input type="hidden" name="txtcity" value=" <?php echo $patients[$n]['city']; ?> " >
                          <input type="hidden" name="txttelphone" value=" <?php echo $patients[$n]['telphone']; ?> " >
                          <input type="hidden" name="txtsex" value=" <?php echo $patients[$n]['sex']; ?> " >
                          <input type="hidden" name="txtblood" value=" <?php echo $patients[$n]['blood']; ?> " >

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
              <!-- /.box-body -->
            </div>
            <!-- /.box -->
          </div>
    </div>


    

    <div class="row">
        
        <div class="col-md-6">
          
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Datos del Paciente</h3>
            </div>
            
            <form role="form">
              <div class="box-body" method="post">
                <div class="form-group col-md-10 col-md-offset-1">
                  <label for="idpa">N° de Paciente</label>
                  <input type="text" class="form-control" id="idpa" value=" <?php echo ( (isset($_POST['txtidpa'])) ? $_POST['txtidpa'] : "" ); ?> " disabled>
                </div>
                <div class="form-group col-md-4 col-md-offset-1">
                  <label for="lname">Apellido</label>
                  <input type="text" class="form-control" id="lname" value=" <?php echo ( (isset($_POST['txtlname'])) ? $_POST['txtlname'] : "" ); ?> " disabled>
                </div>
                <div class="form-group col-md-4">
                  <label for="exampleInputFile">Nombres</label>
                  <input type="text" class="form-control" id="lname" value=" <?php echo ( (isset($_POST['txtname'])) ? $_POST['txtname'] : "" ); ?> " disabled>
                </div>
                <div class="form-group col-md-2">
                  <label for="dni">Dni</label>
                  <input type="text" class="form-control" id="dni" value=" <?php echo ( (isset($_POST['txtdni'])) ? $_POST['txtdni'] : "" ); ?> " disabled>
                </div>
                <div class="form-group col-md-2 col-md-offset-1">
                  <label for="age">Edad</label>
                  <input type="text" class="form-control" id="age" value=" <?php echo ( (isset($_POST['txtage'])) ? $_POST['txtage'] : "" ); ?> " disabled>
                </div>
                <div class="form-group col-md-2">
                  <label for="sex">Sexo</label>
                  <select class="form-control" name="txtsex" style=""  required disabled>
                      <option value="<?php echo ( (isset($_POST['txtsex'])) ? $_POST['txtsex'] : "" ); ?>"><?php echo ( (isset($_POST['txtsex'])) ? $_POST['txtsex'] : "" ); ?></option>
                      <option value="07">F</option>
                      <option value="08">M</option>
                  </select>
                </div>
                <div class="form-group col-md-2">
                  <label for="blood">Factor</label>
                  <select class="form-control" name="txtblood" style=""  required disabled>
                      <option value="<?php echo ( (isset($_POST['txtblood'])) ? $_POST['txtblood'] : "" ); ?>"><?php echo ( (isset($_POST['txtblood'])) ? $_POST['txtblood'] : "" ); ?></option>
                      <option value="07">O-</option>
                      <option value="08">O+</option>
                      <option value="09">A-</option>
                      <option value="10">A+</option>
                      <option value="11">B-</option>
                      <option value="12">B+</option>
                      <option value="13">AB-</option>
                      <option value="14">AB+</option>
                  </select>
                </div>
                <div class="form-group col-md-4">
                  <label for="telphone">Teléfono</label>
                  <input type="text" class="form-control" id="telphone" value=" <?php echo ( (isset($_POST['txttelphone'])) ? $_POST['txttelphone'] : "" ); ?> " disabled>
                </div>
                <div class="form-group col-md-3 col-md-offset-1">
                  <label for="direction">Dirección</label>
                  <input type="text" class="form-control" id="direction" value=" <?php echo ( (isset($_POST['txtdirection'])) ? $_POST['txtdirection'] : "" ); ?> " disabled>
                </div>
                <div class="form-group col-md-3">
                  <label for="city">Ciudad</label>
                  <input type="text" class="form-control" id="city" value=" <?php echo ( (isset($_POST['txtcity'])) ? $_POST['txtcity'] : "" ); ?> " disabled>
                </div>
                <div class="form-group col-md-4 ">
                  <label for="mail">Correo</label>
                  <input type="mail" class="form-control" id="mail" value=" <?php echo ( (isset($_POST['txtmail'])) ? $_POST['txtmail'] : "" ); ?> " disabled>
                </div>
              </div>
              <div class="box-footer">
                <input type="hidden" class="form-control" name="txtIDPA" value=" <?php echo $_POST['txtidpa']; ?> ">
                <input type="hidden" class="form-control" name="txtLNAME" value=" <?php echo $_POST['txtlname']; ?> ">
                <input type="hidden" class="form-control" name="txtNAME" value=" <?php echo $_POST['txtname']; ?> ">
                <input type="hidden" class="form-control" name="txtDNI" value=" <?php echo $_POST['txtdni']; ?> ">
                <input type="hidden" class="form-control" name="txtAGE" value=" <?php echo $_POST['txtage']; ?> ">
                <input type="hidden" class="form-control" name="txtSEX" value=" <?php echo $_POST['txtsex']; ?> ">
                <input type="hidden" class="form-control" name="txtBLOOD" value=" <?php echo $_POST['txtblood']; ?> ">
                <input type="hidden" class="form-control" name="txtTELPHONE" value=" <?php echo $_POST['txttelphone']; ?> ">
                <input type="hidden" class="form-control" name="txtDIRECTION" value=" <?php echo $_POST['txtdirection']; ?> ">
                <input type="hidden" class="form-control" name="txtCITY" value=" <?php echo $_POST['txtcity']; ?> ">
                <input type="hidden" class="form-control" name="txtMAIL" value=" <?php echo $_POST['txtmail']; ?> ">

                <input type="submit" class="btn btn-info" name="accion" value="Editar" id="search" <?php echo ( $accionEdit ); ?> >
                <input type="submit" class="btn btn-warning" name="accion" value="Cancelar" id="search" <?php echo ( $accionCancel ); ?> >
                <input type="submit" class="btn btn-success" name="accion" value="Guardar" id="search" <?php echo ( $accionSave ); ?> >
              </div>
            </form>
          </div>
        </div>
    </div>

  
  
    

  
  </section>
  <!-- fin main content -->


</div>
<!-- fin central section -->