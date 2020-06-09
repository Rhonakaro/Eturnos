<?php

$modaljournal = false;
$showmodal = false;
$modalshow = false;

	if( $_POST['r'] == 'user-add' && $_SESSION['roll'] == 'dba' && !isset($_POST['crud']) ) {
		
		$specs_controller = new SpecsController();

		$specs = $specs_controller->get(); ?>

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
					                    		<input type="password" class="form-control" id="inputpass"  onmouseover="this.type='text'" name="pass" onmouseout="this.type='password'" placeholder="pass" required/>
					                    	</div>
					                	</div>
					                	<div class="form-group">
											<div class="container col-sm-offset-4">
												<input type="radio" name="roll" id="dba" value="dba" required>
													<label for="dba">dba</label>
												<input type="radio" name="roll" id="doc" value="prof" onchange="javascript:showContent()" required>
													<label for="prof">prof</label>
												<input type="radio" name="roll" id="aux" value="aux" required>
													<label for="aux">aux</label>
											</div>	
										</div>
					                </div>
					                <div class="form-group text-center">
										<div id="content" style="display: none;">
											<select text-center name="idspec" placeholder="especialidad" required>
												<?php for ($n=0; $n < count($specs); $n++) { ?>
												<option> <?php echo ($specs[$n]['idspec'].' . '.$specs[$n]['spec']) ?> </option>
												<?php } ?>
											</select>
										</div>
									</div>
					            	<div class="box-footer">
					            		<div class="pull-left">
							                <button type="submit" class="btn btn-default">New User</button>
							                <input type="hidden" name="r" value="user-add">
											<input type="hidden" name="crud" value="set">
										</div>
										<div class="pull-right">
											<a class="btn btn-default" href="users">Back</a>
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

			$doctors_controller = new DoctorsController();
			
		        $new_doctor = array(

		            'idoc' => 0,
		            'idus' => $idus,
		            'idspec' => intval($_POST['idspec'])
		        );
		        
		    print_r($new_doctor);

		    $save_doctor = $doctors_controller->set($new_doctor);

			print('
				<div class="content-wrapper">
					<section class="content">
						<div class="container">
							<div class="row">
								<div class="alert alert-success" role="alert">
						       		<div class="text-center">
						        		<h4 class="alert-heading"> Usuario Guardado!</h4>
						           	</div>
						        </div>
						    </div>
							<div class="row">
								<div class="text-center">
									<a href="users" class="btn btn-default">Back</a>
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
							<div class="row">
								<div class="alert alert-success" role="alert">
						       		<div class="text-center">
						           		<h4 class="alert-heading"> Usuario Guardado!</h4>
						            </div>
								</div>
							</div>
							<div class="row">
								<div class="text-center">
									<a href="users" class="btn btn-default">Back</a>
								</div>
							</div>	
						</div>
					</section>
				</div>   
			');

		}

	} else {

		$controller = new ViewsController();
		$controller->load_view('error401');
	}
?>