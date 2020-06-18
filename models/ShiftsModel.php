<?php 

class ShiftsModel extends Model
{
	public function set( $shifts_data = array() ) {

		foreach ($shifts_data as $key => $value) {
			$$key = $value;
		}

		$this->query = "REPLACE INTO shifts (idsf, registry, idpa, idpr, idce, sdate, hour, state) 
						VALUES ($idsf, '$registry', '$idpa', '$idpr', '$idce', '$sdate', '$hour', '$state')";
		
		$this->set_query();
	}


	public function get( $search = '' ) {

		$this->query = ($search != '')
			
			?"SELECT sh.idsf , sh.registry, pa.dni, pa.lnamepa, pa.namepa, pa.mail, sp.spec, us.lname, us.name, ce.cname, sh.sdate, sh.hour, sh.state
				FROM shifts AS sh
				INNER JOIN patients AS pa ON sh.idpa = pa.idpa
				INNER JOIN professionals AS pr ON sh.idpr = pr.idpr
				INNER JOIN specs AS sp ON pr.idspec = sp.idspec
				INNER JOIN users AS us ON pr.idus = us.idus
				INNER JOIN centers AS ce ON sh.idce = ce.idce WHERE sh.idsf = '$search'"
			:"SELECT sh.idsf , sh.registry, pa.dni, pa.lnamepa, pa.namepa, pa.mail, sp.spec, us.lname, us.name, ce.cname, sh.sdate, sh.hour, sh.state
				FROM shifts AS sh
				INNER JOIN patients AS pa ON sh.idpa = pa.idpa
				INNER JOIN professionals AS pr ON sh.idpr = pr.idpr
				INNER JOIN specs AS sp ON pr.idspec = sp.idspec
				INNER JOIN users AS us ON pr.idus = us.idus
				INNER JOIN centers AS ce ON sh.idce = ce.idce ORDER BY idsf ASC";
		
		$this->get_query();
		
		$num_rows = count($this->rows);
		
		$data = array();

		foreach ($this->rows as $key => $value) {
			array_push($data, $value);
		}

		return $data;
	}


	public function del( $search = '' ) {

		$this->query = "DELETE FROM shifts WHERE idsf = '$search'";
		
		$this->set_query();
	}
	

	public function __destruct() {
		
	}
}		