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

	function buscar($ruta)
	{
		try
		{
			$query = $this->db->get_where('peaje', array('id_ruta' => $ruta));
			if($query->num_rows() > 0)
			{
				return false;
			}
			else
			{
				return true;
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
