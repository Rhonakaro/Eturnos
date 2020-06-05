<?php 

class SessionsController
{
	private $session;

	public function __construct() {
		$this->session = new UsersModel();
	}

	public function login($mail, $pass) {
		return $this->session->validate_user($mail, $pass);
	}

	public function logout() {
		session_start();
		session_destroy();
		header('Location: ./');
	}

	public function __destruct() {

	}

}