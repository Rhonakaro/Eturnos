<?php 

class UsersModel extends Model
{
	public function set( $user_data = array() ) {

		foreach ($user_data as $key => $value) {
				$$key = $value;
		}
		
		$this->query = "INSERT INTO users (idus, lname, name, mail, pass, roll) 
							VALUES ($idus, '$lname', '$name', '$mail', MD5('$pass'), '$roll')";
				
		$this->set_query();

	}


	public function get( $search = '' ) {

		$this->query = ($search != '')
			
			?"SELECT * FROM users WHERE roll = '$search'"
			:"SELECT * FROM users ORDER BY idus ASC";
		
		$this->get_query();
		
		$num_rows = count($this->rows);
		
		$data = array();

		foreach ($this->rows as $key => $value) {
			array_push($data, $value);
		}

		return $data;

	}


	public function del( $search = '' ) {

		$this->query = "DELETE FROM users WHERE idus = '$search'";
		
		$this->set_query();

	}

	public function profile( $user_upddata = array() ) {

		foreach ($user_upddata as $key => $value) {
				$$key = $value;
		}

		$this->query = "UPDATE users SET lname = '$lname', name = '$name', mail = '$mail', roll = '$roll'
						WHERE idus = $idus";

		$this->set_query();

	}


	public function password ( $user_pass = array() ) {

		foreach ($user_pass as $key => $value) {
				$$key = $value;
		}

		$this->query = "UPDATE users SET pass = MD5('$pass')
						WHERE idus = $idus";

		$this->set_query();

	}


	public function validate_user($mail, $pass) {

		$this->query = "SELECT * FROM users WHERE mail = '$mail' AND pass = MD5('$pass')";
		
		$this->get_query();

		$data = array();

		foreach ($this->rows as $key => $value) {
			array_push($data, $value);
		}

		return $data;

	}
	

	public function __destruct() {
	
	}
}		