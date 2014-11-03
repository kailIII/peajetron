<?php
Class Ubicaciones extends CI_Model
{
	function listar()
	{
		$query  = $this->db->get('ubicacion');
		$result = $query->result();

		return json_encode($result);
	}

	function combo()
	{
		$query = $this->db->get('ubicacion');
		foreach($query->result() as $row)
			$combo[] = array("value" => $row->id_ubicacion, "text" => $row->ubicacion);

		return json_encode(array("options" => $combo));
	}
}
?>
