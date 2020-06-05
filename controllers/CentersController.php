<?php 

class CentersController
{
	private $model;

	public function __construct() {
		$this->model = new CentersModel();
	}

	public function set( $center_data = array() ) {
		return $this->model->set($center_data);
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