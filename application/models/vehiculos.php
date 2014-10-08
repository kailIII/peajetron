<?php
Class Vehiculos extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}

	function buscar($placa = null, $id_vehiculo = null)
	{
		$this->db->select('*');
		$this->db->from('vehiculo');
		$this->db->where('placa', $placa);
		$this->db->limit(1);

		$query = $this->db->get();

		if($query->num_rows() == 1)
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
