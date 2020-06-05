<?php 

class SpecsController
{
	private $model;

	public function __construct() {
		$this->model = new SpecsModel();
	}

	public function set( $spec_data = array() ) {
		return $this->model->set($spec_data);
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