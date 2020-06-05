<?php 

class DoccensModel extends Model
{
	public function set( $doccen_data = array() ) {
		
		foreach ($doccen_data as $key => $value) {
			$$key = $value;
		}

		$this->query = "REPLACE INTO doccens (iddc, idoc, day, idce, hin, hout, sts) 
							VALUES ($iddc, $idoc', '$day', $idce, '$hin', '$hout', '$sts')";
		$this->set_query();
	}

	public function get( $search = '' ) {
		
		$this->query = ($search != '')

			?"SELECT dc.iddc, us.lname, us.name, sp.spec, dc.day, ce.cname, dc.hin, dc.hout, dc.sts
				FROM doccens AS dc
				INNER JOIN doctors AS do ON dc.idoc = do.idoc
				INNER JOIN users AS us ON do.idus = us.idus
				INNER JOIN specs AS sp ON do.idspec = sp.idspec
				INNER JOIN centers AS ce ON dc.idce = ce.idce WHERE iddc = '$search'"
			:"SELECT dc.iddc, us.lname, us.name, sp.spec, dc.day, ce.cname, dc.hin, dc.hout, dc.sts
				FROM doccens AS dc
				INNER JOIN doctors AS do ON dc.idoc = do.idoc
				INNER JOIN users AS us ON do.idus = us.idus
				INNER JOIN specs AS sp ON do.idspec = sp.idspec
				INNER JOIN centers AS ce ON dc.idce = ce.idce";
		
		$this->get_query();
		
		$num_rows = count($this->rows);
		
		$data = array();

		foreach ($this->rows as $key => $value) {
			array_push($data, $value);
		}

		return $data;
	}

	public function del( $search = '' ) {
		
		$this->query = "DELETE FROM doccens WHERE iddc = '$search'";
		
		$this->set_query();
	}

	public function __destruct() {
		
	}
}