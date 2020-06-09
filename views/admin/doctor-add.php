
<?php
	$showmodal = 0;
	$modalshow = 0;
	$modaljournal = 0;

  $doctors_controller = new DoctorsController();

  $doctors = $doctors_controller->get();
  //$rows = count($docotrs);

	if( $_POST['r'] == 'doctor-add' && $_SESSION['roll'] == 'dba' && !isset($_POST['crud']) ) {
		
		
		printf('
			<div class="content-wrapper">
    			<section class="content">
    				<div class="container">
    					<div class="row">
		    			    <div class="col-sm-offset-3 col-sm-6">
								<div class="box box-primary">
						            <div class="text-center box-header with-border">
						              <h3 class="box-title">Nuevo Usuario</h3>
						            </div>
						            <form method="post" class="form-horizontal">
						            	<div class="box-body">
							                <div class="form-group">
							                	<label for="inputlname" class="col-sm-2 control-label">Apellido</label>
							                	<div class="col-sm-8">
							                    	<input type="text" class="form-control" id="inputlname" name="lname" placeholder="lname" required>
					                			</div>
						               		</div>
						                	<div class="form-group">
						                		<label for="inputname" class="col-sm-2 control-label">Nombre</label>
						                		<div class="col-sm-8">
						                    		<input type="txt" class="form-control" id="inputname" name="name" placeholder="name" required>
						                  		</div>
						                	</div>
						                	<div class="form-group">
						                		<label for="inputmail" class="col-sm-2 control-label">Correo</label>
						                		<div class="col-sm-8">
						                    		<input type="email" class="form-control" id="inputmail" name="mail" placeholder="mail" required>
						                  		</div>
						                	</div>
						                	<div class="form-group">
						                		<label for="inputpass" class="col-sm-2 control-label">Contraseña</label>
						                		<div class="col-sm-8">
						                    		<input type="password" class="form-control" id="inputpass" name="pass" placeholder="pass" required>
						                  		</div>
						                	</div>
											<div class="form-group">
												<div class="container col-sm-offset-4">
													<input type="radio" name="roll" id="dba" value="dba" required>
														<label for="dba">dba</label>
													<input type="radio" name="roll" id="doc" value="doc" onchange="javascript:showContent()" required>
														<label for="doc">doc</label>
													<input type="radio" name="roll" id="aux" value="aux" required>
														<label for="aux">aux</label>
												</div>	
											</div>
						                </div>
						                <div class="form-group text-center">
											<div id="content" style="display: none;">
												<select text-center name="idspec" placeholder="especialidad">
													<option value="">specs</option>
													%s
												</select>	
											</div>
										</div>
						            	<div class="box-footer" class="">
							                <button type="submit" name="accion" class="btn btn-outline-primary font-weight-bold">Agegar</button>
							                
							                <input type="hidden" name="r" value="user-add">
											<input type="hidden" name="crud" value="set">
											
						              	</div>
						              	
						            </form>
						        </div>
							</div>
						</div>
					</div>
				</section>
			</div>
		', $specs_select);

		var_dump($_POST['lname']);
		var_dump($_POST['name']);
			

		

	} else if( $_POST['r'] == 'user-add' && $_SESSION['roll'] == 'dba' && $_POST['crud'] == 'set' ) {

		$users_controller = new UsersController();

		$new_user = array(
			'idus' => 0,
			'lname' => $_POST['lname'],
			'name' => $_POST['name'],
			'mail' => $_POST['mail'],
			'pass' => $_POST['pass'],
			'roll' => $_POST['roll']
		);
		var_dump($new_user);

		$user = $users_controller->set($new_user);

		$users = $users_controller->get();

		foreach ($users as $key => $value) {
			$$key = $value;
		}

		$rows= array_reverse($$key);

		foreach ($rows as $key => $value) {
			$$key = $value;
		}
		
		$idus = intval($$key);
		$idspec = intval($_POST['idspec']);

		if ($_POST['roll'] == 'doc') {

			$doctors_controller = new DoctorsController();

			$new_doctor = array(
				'idoc' => 0,
				'idus' => $idus,
				'idspec' => $idspec
			);

			$doctor = $doctors_controller->set($new_doctor);
		}

		print('
			<div class="row mb-5 mt-5">
			 	<div class="col-lg-2 offset-lg-5 mt-5">
			    	<div class="container alert alert-success" role="alert">
			       		<div class="container text-center">
			           		<h4 class="alert-heading">Guardado!</h4>
			            </div>
					</div>
				</div>
				<div class="container text-center">
					<a href="users" class="btn btn-link">Back</a>	
				</div>
			</div>   
		');
		
	} else {

		$controller = new ViewsController();
		$controller->load_view('error401');
	}
?>
	
