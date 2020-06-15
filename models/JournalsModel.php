<?php 

class JournalsModel extends Model
{
	public function set( $journals_data = array() ) {
		
		foreach ($journals_data as $key => $value) {
			$$key = $value;
		}

		$this->query = "INSERT INTO Journals (idjou, idpr, day, idce, hour_in, hour_out, state) 
							VALUES ($idjou, $idpr, '$day', $idce, '$hour_in', '$hour_out', '$state')";
		$this->set_query();
	}


	public function get( $search = '' ) {
		
		$this->query = ($search != '')

			?"SELECT js.idjou, us.lname, us.name, sp.spec, js.day, ce.cname, js.hour_in, js.hour_out, js.state
				FROM journals AS js
				INNER JOIN professionals AS pr ON js.idpr = pr.idpr
				INNER JOIN users AS us ON pr.idus = us.idus
				INNER JOIN specs AS sp ON pr.idspec = sp.idspec
				INNER JOIN centers AS ce ON js.idce = ce.idce WHERE idjou = '$search'"
			:"SELECT js.idjou, us.lname, us.name, sp.spec, js.day, ce.cname, js.hour_in, js.hour_out, js.state
				FROM journals AS js
				INNER JOIN professionals AS pr ON js.idpr = pr.idpr
				INNER JOIN users AS us ON pr.idus = us.idus
				INNER JOIN specs AS sp ON pr.idspec = sp.idspec
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


	public function journalupd( $journal_upddata = array() ) {

		foreach ($journal_upddata as $key => $value) {
				$$key = $value;
		}

		$this->query = "UPDATE journals SET day = '$day', idce = $idce, hour_in = '$hour_in', hour_out = '$hour_out', state = '$state'
						WHERE idjou = $idjou";

		$this->set_query();
	}


	public function __destruct() {
		
	}
}