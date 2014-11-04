<?php
Class Peajes extends CI_Model
{
	function listar()
	{
		try
		{
			$query  = $this->db->get('peaje');
			$result = $query->result();

			return json_encode($result);
		}
		catch(Exception $e)
		{		
			log_message('error', $e->getMessage());
			return false;
		}
	}
}
?>
