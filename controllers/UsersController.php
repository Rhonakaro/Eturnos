<?php 

class UsersController
{
	private $model;

	public function __construct() {
		$this->model = new UsersModel();
	}


	public function set( $user_data = array() ) {
		return $this->model->set($user_data);
	}


	public function get( $search= '' ) {
		return $this->model->get($search);
	}


	public function del( $search = '' ) {
		return $this->model->del($search);
	}


	public function profile( $user_upddata = array() ) {
		return $this->model->profile($user_upddata);
	}


	public function password ($pass) {
		return $this->model->password($pass);
	}


	public function __destruct() {
		
	}
}