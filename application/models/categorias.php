<?php
Class Categorias extends CI_Model
{
	function listar()
	{
		$query  = $this->db->get('categoria');
		$result = $query->result();

		return json_encode($result);
	}

	function combo()
	{
		$query = $this->db->get('categoria');
		foreach($query->result() as $row)
			$combo[] = array("value" => $row->id_categoria, "text" => $row->categoria);

		return json_encode(array("options" => $combo));
	}
}
?>
