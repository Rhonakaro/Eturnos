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
							$controller->load_view('homeAd');
							break;

						case 'users':
							if( !isset( $_POST['r'] ) )  $controller->load_view('users');
							else if( $_POST['r'] == 'user-add' )  $controller->load_view('user-add');
							break;

						case 'centers':
							if( !isset( $_POST['r'] ) )  $controller->load_view('centers');
							else if( $_POST['r'] == 'center-add' )  $controller->load_view('center-add');
							break;

						case 'journals':
							if( !isset( $_POST['r'] ) )  $controller->load_view('journals');
							else if( $_POST['r'] == 'journal-add' )  $controller->load_view('journal-add');
							break;

						case 'specs':
							if( !isset( $_POST['r'] ) )  $controller->load_view('specs');
							else if( $_POST['r'] == 'spec-add' )  $controller->load_view('spec-add');
							break;

						case 'doctors':
							if( !isset( $_POST['r'] ) )  $controller->load_view('doctors');
							else if( $_POST['r'] == 'doctor-add' )  $controller->load_view('doctor-add');
							break;

						case 'out':
							$user_session = new SessionsController();
							$user_session->logout();
							break;
								
						default:
							$controller->load_view('error404');
							break;
					}

				} elseif ( $_SESSION['roll'] == 'prof' ) {

					switch ($this->route) {
					
						case 'home':
							$controller->load_view('homePr');
							break;

						case 'patients':
							if( !isset( $_POST['r'] ) )  $controller->load_view('patients');
							else if( $_POST['r'] == 'patient-add' )  $controller->load_view('patient-add');
							break;

						case 'out':
							$user_session = new SessionsController();
							$user_session->logout();
							break;
								
						default:
							$controller->load_view('error404');
							break;
					}

				} else {

					switch ($this->route) {
						
						case 'home':
							$controller->load_view('homeAs');
							break;

						case 'shifts':
							if( !isset( $_POST['r'] ) )  $controller->load_view('shifts');
							else if( $_POST['r'] == 'movieserie-add' )  $controller->load_view('movieserie-add');
							else if( $_POST['r'] == 'movieserie-edit' )  $controller->load_view('movieserie-edit');
							else if( $_POST['r'] == 'movieserie-delete' )  $controller->load_view('movieserie-delete');
							else if( $_POST['r'] == 'movieserie-show' )  $controller->load_view('movieserie-show');
							break;

						case 'patients':
							if( !isset( $_POST['r'] ) )  $controller->load_view('patients');
							else if( $_POST['r'] == 'patient-add' )  $controller->load_view('patient-add');
							break;

						case 'agenda':
							if( !isset( $_POST['r'] ) )  $controller->load_view('dochascen');
							else if( $_POST['r'] == 'status-add' )  $controller->load_view('status-add');
							else if( $_POST['r'] == 'status-edit' )  $controller->load_view('status-edit');
							else if( $_POST['r'] == 'status-delete' )  $controller->load_view('status-delete');
							break;

						case 'medicos':
							if( !isset( $_POST['r'] ) )  $controller->load_view('doctors');
							else if( $_POST['r'] == 'status-add' )  $controller->load_view('status-add');
							else if( $_POST['r'] == 'status-edit' )  $controller->load_view('status-edit');
							else if( $_POST['r'] == 'status-delete' )  $controller->load_view('status-delete');
							break;

						case 'lista':
							if( !isset( $_POST['r'] ) )  $controller->load_view('list');
							else if( $_POST['r'] == 'status-add' )  $controller->load_view('status-add');
							else if( $_POST['r'] == 'status-edit' )  $controller->load_view('status-edit');
							else if( $_POST['r'] == 'status-delete' )  $controller->load_view('status-delete');
							break;

						case 'out':
							$user_session = new SessionsController();
							$user_session->logout();
							break;
								
						default:
							$controller->load_view('error404');
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