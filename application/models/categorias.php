<?php
Class Categorias extends CI_Model
{
	function listar()
	{
		$query  = $this->db->get('categoria');
		$result = $query->result();

		return json_encode($result);
	}
}
?>
