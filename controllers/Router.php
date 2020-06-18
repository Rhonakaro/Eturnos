<?php 
class Router {
	public $route;

	public function __construct($route) {
		//http://php.net/manual/es/function.session-start.php
		//http://php.net/manual/es/session.configuration.php
		//buscar opciones en el PHP.INI
		$session_options = array(
			'use_only_cookies' => 1,
			'auto_start' => 1,
			'read_and_close' => true
		);

		if( !isset($_SESSION) )  session_start($session_options);

		if( !isset($_SESSION['ok']) )  $_SESSION['ok'] = false;


		if($_SESSION['ok']) 
		{
			//Aquí va toda la programación de nuestra webapp
			$this->route = isset($_GET['r']) ? $_GET['r'] : 'home';
			
			$controller = new ViewsController();

				if ( $_SESSION['roll'] == 'dba' ) {

					switch ($this->route) {
						
						case 'home':
							$controller->load_view('home_admin');
							break;

						case 'users_admin':
							if( !isset( $_POST['r'] ) )  $controller->load_view('users_admin');
							else if( $_POST['r'] == 'user_admin-add' )  $controller->load_view('user_admin-add');
							break;

						case 'centers_admin':
							if( !isset( $_POST['r'] ) )  $controller->load_view('centers_admin');
							else if( $_POST['r'] == 'center_admin-add' )  $controller->load_view('center_admin-add');
							break;

						case 'journals_admin':
							if( !isset( $_POST['r'] ) )  $controller->load_view('journals_admin');
							else if( $_POST['r'] == 'journal_admin-add' )  $controller->load_view('journal_admin-add');
							break;

						case 'specs_admin':
							if( !isset( $_POST['r'] ) )  $controller->load_view('specs_admin');
							else if( $_POST['r'] == 'spec_admin-add' )  $controller->load_view('spec_admin-add');
							break;

						case 'professionals_admin':
							if( !isset( $_POST['r'] ) )  $controller->load_view('professionals_admin');
							break;

						case 'out_admin':
							$user_session = new SessionsController();
							$user_session->logout();
							break;
								
						default:
							$controller->load_view('error404_admin');
							break;
					}

				} elseif ( $_SESSION['roll'] == 'prof' ) {

					switch ($this->route) {
					
						case 'home':
							$controller->load_view('home_professional');
							break;

						case 'patients_professional':
							if( !isset( $_POST['r'] ) )  $controller->load_view('patients_professional');
							else if( $_POST['r'] == 'patient_professional-add' )  $controller->load_view('patient_professional-add');
							break;

						case 'out_professional':
							$user_session = new SessionsController();
							$user_session->logout();
							break;
								
						default:
							$controller->load_view('error404_professional');
							break;
					}

				} else {

					switch ($this->route) {
						
						case 'home':
							$controller->load_view('home_assistant');
							break;

						case 'shifts_assistant':
							if( !isset( $_POST['r'] ) )  $controller->load_view('shifts_assistant');
							else if( $_POST['r'] == 'shift_assistant-add' )  $controller->load_view('shift_assistant-add');
							break;

						case 'patients_assistant':
							if( !isset( $_POST['r'] ) )  $controller->load_view('patients_assistant');
							else if( $_POST['r'] == 'patient_assistant-add' )  $controller->load_view('patient_assistant-add');
							break;

						case 'calendars_assistant':
							if( !isset( $_POST['r'] ) )  $controller->load_view('calendar_assistant');
							break;

						case 'out_assistant':
							$user_session = new SessionsController();
							$user_session->logout();
							break;
								
						default:
							$controller->load_view('error404_assistant');
							break;
					}	
				}
		} 
		else {

			if( !isset($_POST['mail']) && !isset($_POST['pass']) ) {
				//aqui formulario autenticacion
				$login_form = new ViewsController();
				$login_form->load_view('login');	
			}
			else {
				$user_session = new SessionsController();
				$session = $user_session->login($_POST['mail'] , $_POST['pass']);

				if( empty($session) ) {					
					//echo 'El usuario y el password son incorrectos';
					$login_form = new ViewsController();
					$login_form->load_view('login');

					header('location: ./?error=El usuario ' . $_POST['mail'] .
						 ' y el password no coinciden');
				} else {
					//echo 'El usuario y el password son correctos';
					//var_dump($session);

					$_SESSION['ok'] = true;
					 
					foreach ($session as $row) {

						$_SESSION['idus'] = $row['idus'];
						$_SESSION['lname'] = $row['lname'];
						$_SESSION['name'] = $row['name'];
						$_SESSION['mail'] = $row['mail'];
						$_SESSION['user'] = $row['user'];
						$_SESSION['pass'] = $row['pass'];
						$_SESSION['roll'] = $row['roll'];
					}

					header('Location: ./');
				}
			}
		}
	}

	public function __destruct() {

	}
}