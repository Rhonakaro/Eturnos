<?php

	$showmodal = $modalshow = $modaljournal = false;
	
	if( $_POST['r'] == 'center_admin-add' && $_SESSION['roll'] == 'dba' && !isset($_POST['crud']) ) { ?>

		<div class="content-wrapper">
    		<section class="content">
    			<div class="container">
    				<br><br><br>
	    				<div class="row">
			    		    <div class="col-sm-offset-3 col-sm-6">
								<div class="box box-info">
						            <div class="text-center box-header with-border">
						              	<h3>Nuevo Centro</h3>
						            </div>
						            <form method="post" class="form-horizontal">
						            	<div class="box-body">
							                <div class="form-group">
							                	<h4><label for="inputcname" class="col-sm-2 control-label">Nombre</label></h4>
							                	<div class="col-sm-8">
							                    	<input type="text" class="form-control" id="inputcname" name="cname" placeholder="nombre" required style="font-size: 20px;">
					                			</div>
						               		</div>
						                	<div class="form-group">
						                		<h4><label for="inputdirection" class="col-sm-2 control-label">Dirección</label></h4>
						                		<div class="col-sm-8">
						                    		<input type="txt" class="form-control" id="inputdirection" name="direction" placeholder="dirección" required style="font-size: 20px;">
						                  		</div>
						                	</div>
						                	<div class="form-group">
						                		<h4><label for="inputtelphone" class="col-sm-2 control-label">Teléfono</label></h4>
						                		<div class="col-sm-8">
						                    		<input type="txt" class="form-control" id="inputtelphone" name="telphone" placeholder="teléfono" required style="font-size: 20px;">
						                  		</div>
						                	</div>
						                	<div class="form-group">
						                		<h4><label for="" class="col-sm-2 control-label">Tipo</label></h4>
						                		<div class="col-sm-4 ">
								                	<select class="form-control" name="type" required style="font-size: 20px padding-bottom: 0px">
								                			<option value=""></option>
									                        <option value="CIC" style="font-size: 20px">CIC</option>
									                        <option value="CAP" style="font-size: 20px">CAP</option>
									                </select>
									            </div>
							                </div>
						                </div>
						                <div class="box-footer">
						            		<div class="pull-right">
								                <button type="submit" class="btn btn-success"><strong>AGREGAR</strong></button>
								                <input type="hidden" name="r" value="center_admin-add">
												<input type="hidden" name="crud" value="set">
											</div>
											<div class="pull-left">
												<a class="btn btn-default" href="centers_admin"><strong>ATRAS</strong></a>
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

	} else if( $_POST['r'] == 'center_admin-add' && $_SESSION['roll'] == 'dba' && $_POST['crud'] == 'set' ) {

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
							<br><br><br><br><br>
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
												<a href="centers_admin" class="btn btn-default">BACK</a>
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
		$controller->load_view('error401_admin');
	}
?>
	
