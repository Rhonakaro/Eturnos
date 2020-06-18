<?php

	$specs_controller = new SpecsController();
	$specs = $specs_controller->get();

	$centers_controller = new CentersController();
	$centers = $centers_controller->get();

	$professionals_controller = new ProfessionalsController();
	$professionals = $professionals_controller->get();

	$journas_controller = new JournalsController();
	$journals = $journas_controller->get();

	$patients_controller = new PatientsController();
	$patient = $patients_controller->get();

	$accion = (isset($_POST['accion'])) ? $_POST['accion'] : "";


	$showmodal = $modalshow = $modaljournal = false;


	switch ($accion) {

	    case 'Search':

	          $professionals_controller = new ProfessionalsController();
	          $professionals = $professionals_controller->get($_POST['txtSPEC']);
	          $rows = count ($patients);

	          print_r($_POST);

	          /*if ( $rows == 0 ) {

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
	                              <div class="form-group col-md-4">
	                                <label for=""><h4><strong>Id</strong></h4></label>
	                                <input type="text" class="form-control" value="<?php echo $idpa ?>" disabled style="font-size: 20px;">
	                              </div>
	                              <div class="form-group col-md-8">
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
	                                <button value="btnshift" type="submit" class="btn btn-info" name="accion"><strong>TURNOS</strong></button>
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

	          }*/
	    break;
      
  	}
		

	if( $_POST['r'] == 'shift_assistant-add' && $_SESSION['roll'] == 'aux' && !isset($_POST['crud']) ) { ?>
		
		<div class="content-wrapper">
    		<section class="content">
    			<div class="col-md-10 col-md-offset-1">
    				<br><br><br>
	    				<div class="row">
			    		    <div class="">
								<div class="box box-success">
						            <div class="text-center box-header with-border">
						              <h3>Nuevo Registro de turno</h3>
						            </div>
						            <form method="post" action="">
						            	<div class="box-body">
						            		<div class="form-group col-md-2">
							                    <h4><label for="">Especialidad</label></h4>
							                    <h4>
							                    	<select class="form-control" id="search3" name="txtSPEC" required>
							                      		<?php for ($n=0; $n < count($specs); $n++) { ?>
							                      		<option><?php echo ($specs[$n]['idspec'] .'_'.$specs[$n]['spec']) ?></option>
							                      		<?php } ?>
							                    	</select>
							                    </h4>
							                </div>
     						                <div class="form-group col-md-3">
							                    <h4><label for="">Profesional</label><button class="btn-xs btn-info pull-right" value="accion" name="Search"> BUSCAR</button><h4>
							                    <input type="text" class="form-control" name="txtLNAMEPA" value="<?php echo $_POST['txt']; ?>" required disabled style="font-size: 20px;">	
							                    <input type="hidden" name="r" Value="shift_assistant-add"><input type="hidden" name="crud" value="set">
							               	</div>

							               
							            </div>
						            	<div class="box-footer">
						            		<div class="pull-right">
						            		    <button type="submit" class="btn btn-success"><strong>AGREGAR</strong></button>
								                <input type="hidden" name="r" value="journal_admin-add">
												<input type="hidden" name="crud" value="set">
											</div>
											<div class="pull-left">
												<a class="btn btn-default" href="journals_admin"><strong>ATRAS</strong></a>
											</div>
										</div>
						            </form>
						        </div>
							</div>
						</div>
				</div>
			</section>
		</div>
		
	<?php

	} else if( $_POST['r'] == 'shift_assistant-add' && $_SESSION['roll'] == 'aux' && $_POST['crud'] == 'set' ) {

		/*$journals_controller = new JournalsController();

		$save_journals = array(

		            'idjou' => 0,
		            'idpr' => intval( $_POST['txtIDPR'] ),
		            'day' => $_POST['txtDAY'],
		            'idce' => intval( $_POST['txtIDCE'] ),
		            'hour_in' => $_POST['txtHOUR_IN'],
		            'hour_out' => $_POST['txtHOUR_OUT'],
		            'state' => $_POST['txtSTATE']
        );


        $journal = $journals_controller->set($save_journals);

        print('
				<div class="content-wrapper">
					<section class="content">
						<div class="container">
							<br><br><br><br><br>
								<div class="row">
									<div class="alert alert-success" role="alert">
							       		<div class="text-center">
							        		<h4 class="alert-heading">Registro Agregado!</h4>
							           	</div>
							        </div>
							    </div>
								<div class="row">
									<div class="text-center">
										<a href="journals_admin" class="btn btn-default">ATRAS</a>
									</div>	
								</div>
						</div>
					</section>
				</div>   
		');*/

	} else {

		$controller = new ViewsController();
		$controller->load_view('error401_assistant');
	}
?>