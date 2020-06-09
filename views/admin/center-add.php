<?php

	$showmodal = 0;
	$modalshow = 0;
	$modaljournal = 0;

	if( $_POST['r'] == 'center-add' && $_SESSION['roll'] == 'dba' && !isset($_POST['crud']) ) { ?>

		<div class="content-wrapper">
    		<section class="content">
    			<div class="container">
    				<div class="row">
		    		    <div class="col-sm-offset-3 col-sm-6">
							<div class="box box-danger">
					            <div class="text-center box-header with-border">
					              <h3 class="box-title">Nuevo Centro</h3>
					            </div>
					            <form method="post" class="form-horizontal">
					            	<div class="box-body">
						                <div class="form-group">
						                	<label for="inputcname" class="col-sm-2 control-label">Nombre</label>
						                	<div class="col-sm-8">
						                    	<input type="text" class="form-control" id="inputcname" name="cname" placeholder="name" required>
				                			</div>
					               		</div>
					                	<div class="form-group">
					                		<label for="inputdirection" class="col-sm-2 control-label">Dirección</label>
					                		<div class="col-sm-8">
					                    		<input type="txt" class="form-control" id="inputdirection" name="direction" placeholder="direction" required>
					                  		</div>
					                	</div>
					                	<div class="form-group">
					                		<label for="inputtelphone" class="col-sm-2 control-label">Teléfono</label>
					                		<div class="col-sm-8">
					                    		<input type="txt" class="form-control" id="inputtelphone" name="telphone" placeholder="telphone" required>
					                  		</div>
					                	</div>
					                	<div class="form-group">
					                		<label for="" class="col-sm-2 control-label">Tipo</label>
					                		<div class="col-sm-4">
							                	<select class="form-control" name="type" required>
							                        <option value="cic">cic</option>
							                        <option value="cap">cap</option>
							                    </select>
							                </div>
						                </div>
					                </div>
					                <div class="box-footer">
					            		<div class="pull-left">
							                <button type="submit" class="btn btn-default">Agegar</button>
							                <input type="hidden" name="r" value="center-add">
											<input type="hidden" name="crud" value="set">
										</div>
										<div class="pull-right">
											<a class="btn btn-default" href="centers">back</a>
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

	} else if( $_POST['r'] == 'center-add' && $_SESSION['roll'] == 'dba' && $_POST['crud'] == 'set' ) {

		$centers_controller = new CentersController();

		$new_center = array(

			'idce' => 0,
			'cname' => $_POST['cname'],
			'direction' => $_POST['direction'],
			'telphone' => $_POST['telphone'],
			'type' => $_POST['type']
			
		);
		
		$center = $centers_controller->set($new_center);

		print('
				<div class="content-wrapper">
					<section class="content">
						<div class="container">
							<div class="row">
								<div class="row mb-5 mt-5">
						 			<div class="">
				    					<div class="alert alert-success" role="alert">
						       				<div class="text-center">
						           				<h4 class="alert-heading"> Centro Guardado!</h4>
						            		</div>
										</div>
									</div>
									<div class="row">
										<div class="text-center">
											<a href="centers" class="btn btn-default">Back</a>
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
	
