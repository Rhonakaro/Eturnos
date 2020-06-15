<?php 

class ProfessionalsController
{
	private $model;

	public function __construct() {
		$this->model = new ProfessionalsModel();
	}


	public function set( $professional_data = array() ) {
		return $this->model->set($professional_data);
	}


	public function get( $search= '' ) {
		return $this->model->get($search);
	}


	public function del( $search = '' ) {
		return $this->model->del($search);
	}


	public function specedit( $professional_upddata = array() ) {
		return $this->model->specedit($professional_upddata);
	}


	public function __destruct() {
		
	}
}