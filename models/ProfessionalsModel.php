<?php 

class ProfessionalsModel extends Model
{
	public function set( $professional_data = array() ) {

		foreach ( $professional_data as $key => $value ) {
				$$key = $value;
		}

		$this->query = "INSERT INTO professionals (idpr, idus, idspec) 
						 VALUES ($idpr, $idus, $idspec)";
		
		$this->set_query();
	}


	public function get( $search = '' ) {

		$this->query = ($search != '')
			
			?"SELECT pr.idpr, us.lname, us.name, pr.idspec FROM professionals AS pr 
				INNER JOIN users AS us ON us.idus = pr.idus 
				WHERE pr.idspec = '$search'"				 
			:"SELECT pr.idpr, us.lname, us.name, sp.spec FROM professionals AS pr 
				INNER JOIN users AS us ON us.idus = pr.idus
				INNER JOIN specs AS sp ON pr.idspec = sp.idspec";
		
		$this->get_query();
		
		$num_rows = count($this->rows);
		
		$data = array();

		foreach ($this->rows as $key => $value) {
			array_push($data, $value);
		}

		return $data;
	}
	

	public function del( $search = '' ) {

		$this->query = "DELETE FROM professionals WHERE idpr = '$search'";
		
		$this->set_query();
	}


	public function specedit( $professional_upddata = array() ) {

		foreach ($professional_upddata as $key => $value) {
				$$key = $value;
		}

		$this->query = "UPDATE professionals SET idspec = $idspec WHERE idpr = $idpr";
						
		$this->set_query();
	}


	public function __destruct() {
		
	}
}		