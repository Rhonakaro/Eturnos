<?php

	$centers_controller = new CentersController();

	$centers = $centers_controller->get();

	$professionals_controller = new ProfessionalsController();
	    
	$professionals = $professionals_controller->get();

	$journas_controller = new JournalsController();

	$journals = $journas_controller->get();

	$showmodal = $modalshow = $modaljournal = false;
		

	if( $_POST['r'] == 'journal_admin-add' && $_SESSION['roll'] == 'dba' && !isset($_POST['crud']) ) { ?>
		
		<div class="content-wrapper">
    		<section class="content">
    			<div class="col-md-10 col-md-offset-1">
    				<br><br><br>
	    				<div class="row">
			    		    <div class="">
								<div class="box box-info">
						            <div class="text-center box-header with-border">
						              <h3>Nuevo Registro de Agenda</h3>
						            </div>
						            <form method="post" action="">
						            	<div class="box-body">
						            		<div class="form-group col-md-2">
							                    <h4><label for="">Día</label></h4>
							                    <h4>
							                    	<select class="form-control" id="search3" name="txtDAY" required>
							                      		<option value="Lunes">Lunes</option>
							                      		<option value="Martes">Martes</option>
							                      		<option value="Miércoles">Miércoles</option>
							                      		<option value="Jueves">Jueves</option>
							                      	<option value="Viernes">Viernes</option>
							                    	</select>
							                    </h4>
							                </div>
     						                <div class="form-group col-md-3">
							                    <h4><label for="">Profesional</label></h4>
							                    <h4>
							                    	<select class="form-control" id="search2" name="txtIDPR" required>
							                      		<?php for ($n=0; $n < count($professionals); $n++) { ?>
							                      		<option><?php echo ($professionals[$n]['idpr'].'_'.$professionals[$n]['lname'].',  '.$professionals[$n]['name']); ?></option>
							                      		<?php } ?>
							                    	</select>
							                    </h4>
							                </div>
							                <div class="form-group col-md-2" >
							                    <h4><label for="">Centro</label></h4>
							                    <h4>
							                    	<select class="form-control" id="search4" name="txtIDCE" equired>
							                      		<?php for ($n=1; $n < count($centers); $n++) { ?>
							                      		<option><?php echo ($centers[$n]['idce'] .'_'.$centers[$n]['cname']) ?></option>
							                      		<?php } ?> 
							                    	</select>
							                    </h4>
							                </div>
						                	<div class="form-group col-md-2">
							                    <h4><label for="">Entrada</label></h4>
							                    <h4>
							                    	<select class="form-control" id="search5" name="txtHOUR_IN" required>
								                      	<option value="07 am.">07 am.</option>
								                      	<option value="08 am.">08 am.</option>
								                      	<option value="09 am.">09 am.</option>
								                      	<option value="10 am.">10 am.</option>
								                      	<option value="11 am.">11 am.</option>
								                      	<option value="12 m.">12 m.</option>
								                      	<option value="13 pm.">13 pm.</option>
								                      	<option value="14 pm.">14 pm.</option>
								                      	<option value="15 pm.">15 pm.</option>
								                      	<option value="16 pm.">16 pm.</option>
								                      	<option value="17 pm.">17 pm.</option>
								                      	<option value="18 pm.">18 pm.</option>
							                    	</select>
							                	</h4>
							                </div>
							                <div class="form-group col-md-2">
							                    <h4><label for="">Salida</label></h4>
							                    <h4>
							                    	<select class="form-control" id="search6" name="txtHOUR_OUT" required>
								                    	<option value="08 am.">08 am.</option>
								                      	<option value="09 am.">09 am.</option>
								                      	<option value="10 am.">10 am.</option>
								                      	<option value="11 am.">11 am.</option>
								                      	<option value="12 m.">12 m.</option>
								                      	<option value="13 pm.">13 pm.</option>
								                      	<option value="14 pm.">14 pm.</option>
								                      	<option value="15 pm.">15 pm.</option>
								                      	<option value="16 pm.">16 pm.</option>
								                      	<option value="17 pm.">17 pm.</option>
								                      	<option value="18 pm.">18 pm.</option>
								                      	<option value="19 pm.">19 pm.</option>
							                    	</select>
							                    </h4>
							                </div>
							                <div class="form-group col-md-1">
							                    <h4><label for="">Estado</label></h4>
							                    <h4>
								                    <select class="form-control" id="search7" name="txtSTATE" required>
								                      <option value="Up">Up</option>
								                      <option value="Down">Down</option>
								                    </select>
								                </h4>
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

	} else if( $_POST['r'] == 'journal_admin-add' && $_SESSION['roll'] == 'dba' && $_POST['crud'] == 'set' ) {

		$journals_controller = new JournalsController();

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
		');

	} else {

		$controller = new ViewsController();
		$controller->load_view('error401_admin');
	}
?>