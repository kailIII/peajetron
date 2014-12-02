<?php
Class Perfil_menu extends CI_Model
{
	function buscar($menu)
	{
		try
		{
			$query = $this->db->get_where('perfil_menu', array('id_menu' => $menu));
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
