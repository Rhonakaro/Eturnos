<?php 

class PatientsModel extends Model
{
	public function set( $patient_data = array() ) {

		foreach ($patient_data as $key => $value) {
			$$key = $value;
		}

		$this->query = "REPLACE INTO patients ( idpa, dni, lname, name, age,  sex, blood, mail, direction, city, telphone ) 
						VALUES ($idpa, '$dni', '$lname', '$name', '$age', '$sex', '$blood', '$mail', '$direction', '$city', '$telphone')";
		
		$this->set_query();
	}


	public function get( $search = '' ) {

		$this->query = ($search != '')
			
			?"SELECT * FROM patients WHERE dni ='$search'"
			:"SELECT * FROM patients ORDER BY idpa ASC";
		
		$this->get_query();
		
		$num_rows = count($this->rows);
		
		$data = array();

		foreach ($this->rows as $key => $value) {
			array_push($data, $value);
		}

		return $data;
	}


	public function del( $search = '' ) {

		$this->query = "DELETE FROM patients WHERE idpa = '$search'";
		
		$this->set_query();
	}
	

	public function __destruct() {
		
	}
}		