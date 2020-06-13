<?php
$modaljournal = false;
$showmodal = false;
$modalshow = false;

	if( $_POST['r'] == 'spec_admin-add' && $_SESSION['roll'] == 'dba' && !isset($_POST['crud']) ) { ?>

		<div class="content-wrapper">
    		<section class="content">
    			<div class="container">
    				<div class="row">
		    		    <div class="col-sm-offset-3 col-sm-6">
							<div class="box box-warning">
					            <div class="text-center box-header with-border">
					              <h3 class="box-title">Nueva Especialidad</h3>
					            </div>
					            <form method="post" class="form-horizontal">
					            	<div class="box-body">
						                <div class="form-group">
						                	<label for="inputspec" class="col-sm-2 control-label">Especialidad</label>
						                	<div class="col-sm-8">
						                    	<input type="text" class="form-control" id="inputspec" name="spec" placeholder="spec" required>
				                			</div>
					               		</div>
					                	<div class="form-group">
					                		<label for="inputname" class="col-sm-2 control-label">Tiempo</label>
					                		<div class="col-sm-8">
					                    		<input type="txt" class="form-control" id="inputsptime" name="sptime" placeholder="time" required>
					                  		</div>
					                	</div>
					                </div>
					                <div class="box-footer">
					            		<div class="pull-right">
							                <button type="submit" class="btn btn-success">CREATE</button>
							                <input type="hidden" name="r" value="spec_admin-add">
											<input type="hidden" name="crud" value="set">
										</div>
										<div class="pull-left">
											<a class="btn btn-default" href="specs_admin">BACK</a>
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

	} else if( $_POST['r'] == 'spec_admin-add' && $_SESSION['roll'] == 'dba' && $_POST['crud'] == 'set' ) {

		$specs_controller = new SpecsController();

		$new_spec = array(

			'idspec' => 0,
			'spec' => $_POST['spec'],
			'sptime' => $_POST['sptime']
			
		);
		
		$spec = $specs_controller->set($new_spec);

		print('
				<div class="content-wrapper">
					<section class="content">
						<div class="container">
							<div class="row">
								<div class="row mb-5 mt-5">
						 			<div class="">
				    					<div class="alert alert-success" role="alert">
						       				<div class="text-center">
						           				<h4 class="alert-heading"> Especialidad Guardada!</h4>
						            		</div>
										</div>
									</div>
									<div class="row">
										<div class="text-center">
											<a href="specs_admin" class="btn btn-default">BACK</a>
										</div>	
									</div>
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