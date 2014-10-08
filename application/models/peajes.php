<?php
Class Peajes extends CI_Model
{
	function listar()
	{
		$peaje = '{';
		$query = $this->db->get('peaje');
		foreach ($query->result() as $row)
		{
			$peaje .= '"'.$row->id_peaje.'": "'.$row->peaje.'"';
		}
		$peaje = trim($peaje, ',');
		$peaje .= '}';

		return $peaje;
	}
}
?>
