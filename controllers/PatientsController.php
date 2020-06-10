<?php 

class PatientsController
{
	private $model;

	public function __construct() {
		$this->model = new PatientsModel();
	}

	public function set( $patient_data = array() ) {
		return $this->model->set($patient_data);
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