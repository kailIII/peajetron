<?php
Class Perfiles extends CI_Model
{
	function listar()
	{
		try
		{
			$query  = $this->db->get('perfil');
			$result = $query->result();

			return json_encode($result);
		}
		catch(Exception $e)
		{		
			log_message('error', $e->getMessage());
			return false;
		}
	}

	function combo()
	{
		try
		{
			$query = $this->db->get('perfil');
			foreach($query->result() as $row)
				$combo[] = array("value" => $row->id_perfil, "text" => $row->perfil);

			return json_encode(array("options" => $combo));
		}
		catch(Exception $e)
		{		
			log_message('error', $e->getMessage());
			return false;
		}
	}
}
?>
