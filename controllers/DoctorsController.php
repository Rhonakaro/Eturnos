<?php 

class DoctorsController
{
	private $model;

	public function __construct() {
		$this->model = new DoctorsModel();
	}

	public function set( $doctor_data = array() ) {
		return $this->model->set($doctor_data);
	}

	public function get( $search= '' ) {
		return $this->model->get($search);
	}

	public function del( $search = '' ) {
		return $this->model->del($search);
	}

	public function __destruct() {
		
	}
}