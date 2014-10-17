<?php
Class Vehiculos extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}

	function buscar($placa = null, $id_vehiculo = null)
	{
		$query = $this->db->get_where('vehiculo', array('placa' => $placa));
		if($query->num_rows() > 0)
		{
			return $query->result();
		}
		else
		{
			return false;
		}
	}
}
?>
