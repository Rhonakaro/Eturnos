<?php 

class JournalsController
{
	private $model;

	public function __construct() {
		$this->model = new JournalsModel();
	}

	public function set( $journals_data = array() ) {
		return $this->model->set($journals_data);
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