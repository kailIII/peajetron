<?php
Class Rutas extends CI_Model
{
	function combo()
	{
		$query = $this->db->get('ruta');
		foreach($query->result() as $row)
			$combo[] = array("value" => $row->id_ruta, "text" => $row->ruta);

		return json_encode(array("options" => $combo));
	}
}
?>
