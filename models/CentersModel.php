<?php 

class CentersModel extends Model
{
	public function set( $center_data = array() ) {
		
		foreach ($center_data as $key => $value) {
			$$key = $value;
		}

		$this->query = "REPLACE INTO centers (idce, cname, direction, telphone, type) 
							VALUES ($idce, '$cname', '$direction', '$telphone', '$type')";
		$this->set_query();
	}

	public function get( $search = '' ) {
		
		$this->query = ($search != '')

			?"SELECT * FROM centers WHERE idce = '$search'"
			:"SELECT * FROM centers ORDER BY idce ASC";
		
		$this->get_query();
		
		$num_rows = count($this->rows);
		
		$data = array();

		foreach ($this->rows as $key => $value) {
			array_push($data, $value);
		}

		return $data;
	}

	public function del( $search = '' ) {
		
		$this->query = "DELETE FROM centers WHERE idce = '$search'";
		$this->set_query();
	}

	public function __destruct() {
		
	}
}