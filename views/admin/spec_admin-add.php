<?php

	$showmodal = $modalshow = $modaljournal = false;

	if( $_POST['r'] == 'spec_admin-add' && $_SESSION['roll'] == 'dba' && !isset($_POST['crud']) ) { ?>

		<div class="content-wrapper">
    		<section class="content">
    			<div class="container">
    				<br><br><br>
	    				<div class="row">
			    		    <div class="col-sm-offset-3 col-sm-6">
								<div class="box box-info">
						            <div class="text-center box-header with-border">
						              	<h3>Nueva Especialidad</h3>
						            </div>
						            <form method="post" class="form-horizontal">
						            	<div class="box-body">
							                <div class="form-group">
							                	<h4><label for="inputspec" class="col-sm-3 control-label">Especialidad</label></h4>
							                	<div class="col-sm-7">
							                    	<input type="text" class="form-control" id="inputspec" name="spec" placeholder="especialidad" required style="font-size: 20px;">
					                			</div>
						               		</div>
						                	<div class="form-group">
						                		<h4><label for="inputname" class="col-sm-3 control-label">Tiempo</label></h4>
						                		<div class="col-sm-7">
						                    		<select class="form-control col-md-3" name="sptime" required style="font-size: 20px; padding-bottom: 0px">
								                        <option value="10 am." style="font-size: 20px;">10 min.</option>
								                        <option value="15 am." style="font-size: 20px;">15 min.</option>
								                        <option value="20 am." style="font-size: 20px;">20 min.</option>
								                        <option value="25 min." style="font-size: 20px;">25 min.</option>
								                        <option value="30 min." style="font-size: 20px;">30 min.</option>
								                        <option value="35 min." style="font-size: 20px;">35 min.</option>
								                        <option value="40 min." style="font-size: 20px;">40 min.</option>
								                        <option value="45 min." style="font-size: 20px;">45 min.</option>
								                        <option value="50 min." style="font-size: 20px;">50 min.</option>
								                        <option value="55 min." style="font-size: 20px;">55 min.</option>
								                        <option value="60 min." style="font-size: 20px;">60 min.</option>
							                        </select>
						                  		</div>
						                	</div>
						                </div>
						                <div class="box-footer">
						            		<div class="pull-right">
								                <button type="submit" class="btn btn-success"><strong>AGREGAR</strong></button>
								                <input type="hidden" name="r" value="spec_admin-add">
												<input type="hidden" name="crud" value="set">
											</div>
											<div class="pull-left">
												<a class="btn btn-default" href="specs_admin"><strong>ATRAS</strong></a>
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
							<br><br><br><br><br>
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
												<a href="specs_admin" class="btn btn-default">ATRAS</a>
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