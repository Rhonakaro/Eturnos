<?php 

class SpecsModel extends Model
{
	public function set( $spec_data = array() ) {

		foreach ($spec_data as $key => $value) {
			$$key = $value;
		}

		$this->query = "REPLACE INTO specs (idspec, spec, sptime) 
						VALUES ($idspec, '$spec', '$sptime')";
		
		$this->set_query();
	}


	public function get( $search = '' ) {

		$this->query = ($search != '')
			
			?"SELECT * FROM specs WHERE idspec ='$search'"
			:"SELECT * FROM specs ORDER BY idspec ASC";
		
		$this->get_query();
		
		$num_rows = count($this->rows);
		
		$data = array();

		foreach ($this->rows as $key => $value) {
			array_push($data, $value);
		}

		return $data;
	}


	public function del( $search = '' ) {

		$this->query = "DELETE FROM specs WHERE idspec = '$search'";
		
		$this->set_query();
	}
	

	public function __destruct() {
		
	}
}		