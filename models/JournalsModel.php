<?php 

class JournalsModel extends Model
{
	public function set( $journals_data = array() ) {
		
		foreach ($journals_data as $key => $value) {
			$$key = $value;
		}

		$this->query = "REPLACE INTO Journals (idjou, idoc, day, idce, hour_in, hour_out, state) 
							VALUES ($idjou, $idoc, '$day', $idce, '$hour_in', '$hour_out', '$state')";
		$this->set_query();
	}

	public function get( $search = '' ) {
		
		$this->query = ($search != '')

			?"SELECT js.idjou, us.lname, us.name, sp.spec, js.day, ce.cname, js.hour_in, js.hour_out, js.state
				FROM journals AS js
				INNER JOIN doctors AS do ON js.idoc = do.idoc
				INNER JOIN users AS us ON do.idus = us.idus
				INNER JOIN specs AS sp ON do.idspec = sp.idspec
				INNER JOIN centers AS ce ON js.idce = ce.idce WHERE idjou = '$search'"
			:"SELECT js.idjou, us.lname, us.name, sp.spec, js.day, ce.cname, js.hour_in, js.hour_out, js.state
				FROM journals AS js
				INNER JOIN doctors AS do ON js.idoc = do.idoc
				INNER JOIN users AS us ON do.idus = us.idus
				INNER JOIN specs AS sp ON do.idspec = sp.idspec
				INNER JOIN centers AS ce ON js.idce = ce.idce";
		
		$this->get_query();
		
		$num_rows = count($this->rows);
		
		$data = array();

		foreach ($this->rows as $key => $value) {
			array_push($data, $value);
		}

		return $data;
	}

	public function del( $search = '' ) {
		
		$this->query = "DELETE FROM journals WHERE idjou = '$search'";
		
		$this->set_query();
	}

	public function __destruct() {
		
	}
}