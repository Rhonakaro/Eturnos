<?php 

class ShiftsController
{
	private $model;

	public function __construct() {
		$this->model = new ShiftsModel();
	}


	public function set( $shifts_data = array() ) {
		return $this->model->set($shifts_data);
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