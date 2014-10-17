<?php
Class Peajes extends CI_Model
{
	function listar()
	{
		$query  = $this->db->get('peaje');
		$result = $query->result();

		return json_encode($result);
	}
}
?>
