<?php

	$centers_controller = new CentersController();

	$centers = $centers_controller->get();

	$doctors_controller = new DoctorsController();
	    
	$doctors = $doctors_controller->get();

	$journas_controller = new JournalsController();

	$journals = $journas_controller->get();

	$showmodal = 0;
	$modalshow = 0;
	$modaljournal = 0;

	if( $_POST['r'] == 'journal-add' && $_SESSION['roll'] == 'dba' && !isset($_POST['crud']) ) { ?>
		
		<div class="content-wrapper">
    		<section class="content">
    			<div class="col-md-10 col-md-offset-1">
    				<div class="row">
		    		    <div class="">
							<div class="box box-primary">
					            <div class="text-center box-header with-border">
					              <h3 class="box-title">Nuevo Registro de Agenda</h3>
					            </div>
					            <form method="post" action="">
					            	<div class="box-body">
					            		<div class="form-group col-md-2">
						                    <label for="">Día</label>
						                    <select class="form-control" id="search3" name="txtDAY" style=""  required>
						                      <option value="Lunes">Lunes</option>
						                      <option value="Martes">Martes</option>
						                      <option value="Miércoles">Miércoles</option>
						                      <option value="Jueves">Jueves</option>
						                      <option value="Viernes">Viernes</option>
						                    </select>
						                </div>
						                
						                <div class="form-group col-md-3">
						                    <label for="">Profesional</label>
						                    <select class="form-control" id="search2" name="txtIDOC" style=""  required>
						                      <?php for ($n=0; $n < count($doctors); $n++) { ?>
						                      <option> <?php echo ($doctors[$n]['idoc'].'_'.$doctors[$n]['lname'].',  '.$doctors[$n]['name']); ?> </option>
						                      <?php } ?>
						                    </select>
						                </div>
						                
					                	<div class="form-group col-md-3" >
						                    <label for="">Centro</label>
						                    <select class="form-control" id="search4" name="txtIDCE" style=""  required>
						                      <?php for ($n=1; $n < count($centers); $n++) { ?>
						                      <option> <?php echo ($centers[$n]['idce'] .'_'.$centers[$n]['cname']) ?> </option>
						                      <?php } ?> 
						                    </select>
						                </div>

					                	<div class="form-group col-md-1">
						                    <label for="">H. Entrada</label>
						                    <select class="form-control" id="search5" name="txtHOUR_IN" style=""  required>
						                      <option value="07">07</option>
						                      <option value="08">08</option>
						                      <option value="09">09</option>
						                      <option value="10">10</option>
						                      <option value="11">11</option>
						                      <option value="12">12</option>
						                      <option value="13">13</option>
						                      <option value="14">14</option>
						                      <option value="15">15</option>
						                      <option value="16">16</option>
						                      <option value="17">17</option>
						                      <option value="18">18</option>
						                    </select>
						                </div>

						                <div class="form-group col-md-1">
						                    <label for="">H. Salida</label>
						                    <select class="form-control" id="search6" name="txtHOUR_OUT" style=""  required>
						                      <option value="08">08</option>
						                      <option value="09">09</option>
						                      <option value="10">10</option>
						                      <option value="11">11</option>
						                      <option value="12">12</option>
						                      <option value="13">13</option>
						                      <option value="14">14</option>
						                      <option value="15">15</option>
						                      <option value="16">16</option>
						                      <option value="17">17</option>
						                      <option value="18">18</option>
						                      <option value="19">19</option>
						                    </select>
						                </div>

						                <div class="form-group col-md-2">
						                    <label for="">Estado</label>
						                    <select class="form-control" id="search7" name="txtSTATE" style=""  required>
						                      <option value="Up">Up</option>
						                      <option value="Down">Down</option>
						                    </select>
						                </div>
						            </div>
					            	<div class="box-footer">
					            		<div class="pull-left">
							                <button type="submit" class="btn btn-default">Add</button>
							                <input type="hidden" name="r" value="journal-add">
											<input type="hidden" name="crud" value="set">
										</div>
										<div class="pull-right">
											<a class="btn btn-default" href="journals">Back</a>
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

	} else if( $_POST['r'] == 'journal-add' && $_SESSION['roll'] == 'dba' && $_POST['crud'] == 'set' ) {

		$journals_controller = new JournalsController();

		$save_journals = array(

		            'idjou' => 0,
		            'idoc' => intval( $_POST['txtIDOC'] ),
		            'day' => $_POST['txtDAY'],
		            'idce' => intval( $_POST['txtIDCE'] ),
		            'hour_in' => $_POST['txtHOUR_IN'],
		            'hour_out' => $_POST['txtHOUR_OUT'],
		            'state' => $_POST['txtSTATE']
        );


        $journal = $journals_controller->set($save_journals);

        var_dump($save_journals);
		
		print('
				<div class="content-wrapper">
					<section class="content">
						<div class="container">
							<div class="row">
								<div class="alert alert-success" role="alert">
						       		<div class="text-center">
						        		<h4 class="alert-heading"> Registro Agregado!</h4>
						           	</div>
						        </div>
						    </div>
							<div class="row">
								<div class="text-center">
									<a href="journals" class="btn btn-default">Back</a>
								</div>	
							</div>
						</div>
					</section>
				</div>   
		');

	} else {

		$controller = new ViewsController();
		$controller->load_view('error401');
	}
?>