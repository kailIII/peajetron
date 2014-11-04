<?php
Class Tarifas extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}

	function buscar($id_peaje, $id_categoria)
	{
		try
		{
			$query = $this->db->get_where('tarifa', array('id_peaje' => $id_peaje, 'id_categoria' => $id_categoria));
			if($query->num_rows() > 0)
			{
				return $query->result();
			}
			else
			{
				return false;
			}
		}
		catch(Exception $e)
		{		
			log_message('error', $e->getMessage());
			return false;
		}
	}
}
?>
