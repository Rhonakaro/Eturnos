<?php 

class PatientsModel extends Model
{
	public function set( $patients_data = array() ) {

		foreach ($patients_data as $key => $value) {
			$$key = $value;
		}

		$this->query = "REPLACE INTO patients ( idpa, dni, lname, name, mail, telphone, sex, blood ) 
						VALUES ($idpa, '$dni', '$lname', '$name', '$mail', '$telphone', '$sex', '$blood')";
		
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