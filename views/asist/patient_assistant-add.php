<?php

$modaljournal = $showmodal = $modalshow = false;

	if( $_POST['r'] == 'patient_assistant-add' && $_SESSION['roll'] == 'aux' && !isset($_POST['crud']) ) {
		
	?>

		<div class="content-wrapper">
    		<section class="content">
    			<div class="container">
    				<br><br><br>
	    				<div class="row">
			    		    <div class="col-sm-offset-3 col-sm-6">
								<div class="box box-info">
						            <div class="text-center box-header with-border">
						              <h3>Nuevo Paciente</h3>
						            </div>
						            <form method="post" >
						            	<div class="box-body">
						                    <div class="form-group col-md-6">
						                        <label for=""><h4><strong>N° de Dni</strong></h4></label>
						                        <input type="text" class="form-control" name="txtDNI" placeholder="ingrese n° de dni"  required style="font-size: 20px;">
						                    </div>
					                      	<div class="form-group col-md-6">
					                        	<label for=""><h4><strong>Apellido</strong></h4></label>
					                        	<input type="text" class="form-control" name="txtLNAMEPA" placeholder="ingrese apellido" required style="font-size: 20px;">
						                    </div>
						                    <div class="form-group col-md-6">
						                        <label for=""><h4><strong>Nombres</strong></h4></label>
						                        <input type="text" class="form-control" name="txtNAMEPA" placeholder="ingrese nombres" required style="font-size: 20px;">
						                    </div>
						                    <div class="form-group col-md-3">
						                        <label for=""><h4><strong>Edad</strong></h4></label>
						                        <input type="text" class="form-control" name="txtAGE" placeholder="edad" required style="font-size: 20px;">
						                    </div>
					                        <div class="form-group col-md-3">
						                        <label for=""><h4><strong>Sexo</strong></h4></label>
						                        <select class="form-control" name="txtSEX" required style="font-size: 20px; padding-bottom: 0px">
						                            <option style="font-size: 20px;" value="F">F</option>
						                          	<option style="font-size: 20px;" value="M">M</option>
						                          	<option style="font-size: 20px;" value="O">O</option>
					                        	</select>
					                        </div>
						                    <div class="form-group col-md-4">
						                        <label for=""><h4><strong>Factor S.</strong></h4></label>
						                        <select class="form-control col-md-3" name="txtBLOOD" required style="font-size: 20px; padding-bottom: 0px">
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
						                    <div class="form-group col-md-12">
						                        <label for=""><h4><strong>Correo</strong></h4></label>
						                        <input type="mail" class="form-control" name="txtMAIL" placeholder="ingrese correo" required style="font-size: 20px;">
						                    </div>
						                    <div class="form-group col-md-6">
						                        <label for=""><h4><strong>Dirección</strong></h4></label>
						                        <input type="mail" class="form-control" name="txtDIRECTION" placeholder="ingrese dirección" required style="font-size: 20px;">
						                    </div>
						                    <div class="form-group col-md-6">
						                        <label for=""><h4><strong>Barrio</strong></h4></label>
						                        <input type="mail" class="form-control" name="txtDISTRIC" placeholder="ingrese barrio" required style="font-size: 20px;">
						                    </div>
						                    <div class="form-group col-md-6">
						                        <label for=""><h4><strong>Ciudad</strong></h4></label>
						                        <input type="mail" class="form-control" name="txtCITY" placeholder="ingrese ciudad" required style="font-size: 20px;">
						                    </div>
						                    <div class="form-group col-md-6">
						                        <label for=""><h4><strong>Teléfono</strong></h4></label>
						                        <input type="text" class="form-control" name="txtTELPHONE" placeholder="ingrese numero de teléfono" style="font-size: 20px;">
						                    </div>
					                  	</div>
						                
						            	<div class="box-footer">
						            		<div class="pull-right">
								                <button type="submit" class="btn btn-success"><strong>GUARDAR</strong></button>
								                <input type="hidden" name="r" value="patient_assistant-add">
												<input type="hidden" name="crud" value="set">
											</div>
											<div class="pull-left">
												<a class="btn btn-default" href="patients_assistant"><strong>CANCELAR</strong></a>
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

	} else if( $_POST['r'] == 'patient_assistant-add' && $_SESSION['roll'] == 'aux' && $_POST['crud'] == 'set' ) {

		$patients_controller = new PatientsController();

		$new_patient = array(

			'idpa' => 0,
			'dni' => $_POST['txtDNI'],
			'lnamepa' => $_POST['txtLNAMEPA'],
			'namepa' => $_POST['txtNAMEPA'],
			'age' => $_POST['txtAGE'],
			'sex' => $_POST['txtSEX'],
			'blood' => $_POST['txtBLOOD'],
			'mail' => $_POST['txtMAIL'],
			'direction' => $_POST['txtDIRECTION'],
			'district' => $_POST['txtDISTRIC'],
			'city' => $_POST['txtCITY'],
			'telphone' => $_POST['txtTELPHONE']	

		);
		
		$patient = $patients_controller->set($new_patient);

		print('
				<div class="content-wrapper">
					<section class="content">
						<div class="container">
							<div class="row">
								<div class="alert alert-success" role="alert">
						       		<div class="text-center">
						           		<h4 class="alert-heading"> Paciente Guardado!</h4>
						            </div>
								</div>
							</div>
							<div class="row">
								<div class="text-center">
									<a href="patients_assistant" class="btn btn-default">ATRAS</a>
								</div>
							</div>	
						</div>
					</section>
				</div>   
			');

	} else {

		$controller = new ViewsController();
		$controller->load_view('error401_assistant');
	}
?>