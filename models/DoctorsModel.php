<?php 

class DoctorsModel extends Model
{
	public function set( $doctor_data = array() ) {

		foreach ( $doctor_data as $key => $value ) {
				$$key = $value;
		}

		$this->query = "INSERT INTO doctors (idoc, idus, idspec) 
						 VALUES ($idus, $idoc, $idspec)";
		
		$this->set_query();
	}

	public function get( $search = '' ) {

		$this->query = ($search != '')
			
			?"SELECT do.idoc, us.lname, us.name, sp.spec FROM doctors AS do 
				INNER JOIN users AS us ON do.idus = us.idus
				INNER JOIN specs AS sp ON do.idspec = sp.idspec WHERE do.idoc = '$search'"
			:"SELECT do.idoc, us.lname, us.name, sp.spec FROM doctors AS do 
				INNER JOIN users AS us ON do.idus = us.idus
				INNER JOIN specs AS sp ON do.idspec = sp.idspec";
		
		$this->get_query();
		
		$num_rows = count($this->rows);
		
		$data = array();

		foreach ($this->rows as $key => $value) {
			array_push($data, $value);
		}

		return $data;
	}

	public function del( $search = '' ) {

		$this->query = "DELETE FROM doctors WHERE idoc = '$search'";
		
		$this->set_query();
	}

	public function __destruct() {
		
	}
}		