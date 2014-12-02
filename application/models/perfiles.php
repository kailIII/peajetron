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

	function grid($columnas)
	{
		try
		{
			$ch = '';
			for($i = 0; $i < $columnas; $i++)
				$ch .= '0,';
			$ch = trim($ch, ',');
			$query = $this->db->get('perfil');
			$json = '{rows:[';
			foreach($query->result() as $row)
			{
				$json .= '{id:'.$row->id_perfil.',data:["'.$row->perfil.'",'.$ch.']},';
			}
			$json = trim($json, ',');
			$json .= ']}';
			return $json;
		}
		catch(Exception $e)
		{		
			log_message('error', $e->getMessage());
			return false;
		}
	}
}
?>
