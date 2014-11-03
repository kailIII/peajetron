<?php
Class Perfiles extends CI_Model
{
	function listar()
	{
		$query  = $this->db->get('perfil');
		$result = $query->result();

		return json_encode($result);
	}

	function combo()
	{
		$query = $this->db->get('perfil');
		foreach($query->result() as $row)
			$combo[] = array("value" => $row->id_perfil, "text" => $row->perfil);

		return json_encode(array("options" => $combo));
	}
}
?>
