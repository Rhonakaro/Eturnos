<?php

	$showmodal = $modalshow = $modaljournal = false;

	if( $_POST['r'] == 'user_admin-add' && $_SESSION['roll'] == 'dba' && !isset($_POST['crud']) ) {
		
		$specs_controller = new SpecsController();

		$specs = $specs_controller->get(); ?>

		<div class="content-wrapper">
    		<section class="content">
    			<div class="container">
    				<br><br><br>
	    				<div class="row">
			    		    <div class="col-sm-offset-3 col-sm-6">
								<div class="box box-info">
						            <div class="text-center box-header with-border">
						              	<h3>Nuevo Usuario</h3>
						            </div>
						            <form method="post" class="form-horizontal">
						            	<div class="box-body">
							                <div class="form-group">
							                	<h4><label for="inputlname" class="col-sm-3 control-label">Apellido</label></h4>
							                	<div class="col-sm-7">
							                    	<input type="text" class="form-control" id="inputlname" name="lname" placeholder="apellido" required style="font-size: 20px;">
					                			</div>
						               		</div>
						                	<div class="form-group">
						                		<h4><label for="inputname" class="col-sm-3 control-label">Nombre</label></h4>
						                		<div class="col-sm-7">
						                    		<input type="txt" class="form-control" id="inputname" name="name" placeholder="nombres" required style="font-size: 20px;">
						                  		</div>
						                	</div>
						                	<div class="form-group">
						                		<h4><label for="inputmail" class="col-sm-3 control-label">Correo</label></h4>
						                		<div class="col-sm-7">
						                    		<input type="email" class="form-control" id="inputmail" name="mail" placeholder="correo" required style="font-size: 20px;">
						                  		</div>
						                	</div>
						                	<div class="form-group">
						                		<h4><label for="inputpass" class="col-sm-3 control-label">Contraseña</label></h4>
						                		<div class="col-sm-7">
						                    		<input type="password" class="form-control" id="inputpass"  onmouseover="this.type='text'" name="pass" onmouseout="this.type='password'" placeholder="contraseña" required/ style="font-size: 20px;">
						                    	</div>
						                	</div>
						                	<div class="form-group">
												<div class="container col-sm-offset-3">
													<input type="radio" name="roll" id="dba" value="dba" required>
														<label for="dba">&nbsp; Administrador &nbsp; &nbsp; </label>
													<input type="radio" name="roll" id="doc" value="prof" onchange="javascript:showContent()" required>
														<label for="prof">&nbsp; Profesional &nbsp; &nbsp; </label>
													<input type="radio" name="roll" id="aux" value="aux" required>
														<label for="aux">&nbsp; Assistente</label>
												</div>	
											</div>
						                </div>
						                <div class="form-group text-center">
											<div id="content" style="display: none;">
												<select text-center name="idspec" placeholder="especialidad" required>
													<?php for ($n=0; $n < count($specs); $n++) { ?>
													<option style="font-size: 17px"><?php echo ($specs[$n]['idspec'].' . '.$specs[$n]['spec']) ?></option>
													<?php } ?>
												</select>
											</div>
										</div>
						            	<div class="box-footer">
						            		<div class="pull-right">
								                <button type="submit" class="btn btn-success"><strong>AGREGAR</strong></button>
								                <input type="hidden" name="r" value="user_admin-add">
												<input type="hidden" name="crud" value="set">
											</div>
											<div class="pull-left">
												<a class="btn btn-default" href="users_admin"><strong>ATRAS</strong></a>
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

	} else if( $_POST['r'] == 'user_admin-add' && $_SESSION['roll'] == 'dba' && $_POST['crud'] == 'set' ) {

		$users_controller = new UsersController();

		$new_user = array(
			'idus' => 0,
			'lname' => $_POST['lname'],
			'name' => $_POST['name'],
			'mail' => $_POST['mail'],
			'pass' => $_POST['pass'],
			'roll' => $_POST['roll']
		);
		
		$user = $users_controller->set($new_user);

		
		if ( $_POST['roll'] == 'prof' ) {

			
			$users_count = $users_controller->get('prof');

			foreach ($users_count as $key => $value) {
				$$key = $value;
			}

			$reverse_array = array_reverse($$key);

			foreach ($reverse_array as $key => $value) {
				$$key = $value;
			}
			
			$idus = intval($$key); //ultimo ID roll DOC insertado

			$professionals_controller = new ProfessionalsController();
			
		    $new_professional = array(

		            'idpr' => 0,
		            'idus' => $idus,
		            'idspec' => intval($_POST['idspec'])
		    );
		        
		    $save_professional = $professionals_controller->set($new_professional);

			print('
				<div class="content-wrapper">
					<section class="content">
						<div class="container">
							<br><br><br><br><br>
								<div class="row">
									<div class="alert alert-success" role="alert">
							       		<div class="text-center">
							        		<h4 class="alert-heading"> Professional Guardado!</h4>
							           	</div>
							        </div>
							    </div>
								<div class="row">
									<div class="text-center">
										<a href="professionals_admin" class="btn btn-default">ATRAS</a>
									</div>	
								</div>
						</div>
					</section>
				</div>   
			');

		} else {

			print('
				<div class="content-wrapper">
					<section class="content">
						<div class="container">
							<br><br><br><br><br>
								<div class="row">
									<div class="alert alert-success" role="alert">
							       		<div class="text-center">
							           		<h4 class="alert-heading"> Usuario Guardado!</h4>
							            </div>
									</div>
								</div>
								<div class="row">
									<div class="text-center">
										<a href="users_admin" class="btn btn-default">ATRAS</a>
									</div>
								</div>	
						</div>
					</section>
				</div>   
			');

		}

	} else {

		$controller = new ViewsController();
		$controller->load_view('error401_admin');
	}
?>