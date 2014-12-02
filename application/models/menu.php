<?php
Class Menu extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}

	function ensamblar($perfil)
	{
		try
		{
			$this->db->select('menu.id_menu, menu, url, icono');
			$this->db->from('perfil_menu');
			$this->db->join('menu', 'menu.id_menu = perfil_menu.id_menu');
			$this->db->where(array('id_menu_padre IS NULL' => null, 'id_perfil' => $perfil));
			$this->db->order_by('orden');

			$menu = '[';
			$menup = $this->db->get();
			foreach($menup->result() as $rowp)
			{
				$menu .= '{id: "m'.$rowp->id_menu.'", text: "'.$rowp->menu.'", img: "'.$rowp->icono.'", items: [';
				$this->db->select('menu.id_menu, menu, url, icono');
				$this->db->from('perfil_menu');
				$this->db->join('menu', 'menu.id_menu = perfil_menu.id_menu');
				$this->db->where(array('id_menu_padre' => $rowp->id_menu, 'id_perfil' => $perfil));
				$this->db->order_by('orden');
				$menuh = $this->db->get();
				foreach($menuh->result() as $rowh)
				{
					$menu .= '{id: "'.$rowh->url.'", text: "'.$rowh->menu.'", img: "'.$rowh->icono.'", items: [';
					$this->db->select('menu.id_menu, menu, url, icono');
					$this->db->from('perfil_menu');
					$this->db->join('menu', 'menu.id_menu = perfil_menu.id_menu');
					$this->db->where(array('id_menu_padre' => $rowh->id_menu, 'id_perfil' => $perfil));
					$this->db->order_by('orden');
					$menuhh = $this->db->get();
					foreach($menuhh->result() as $rowhh)
						$menu .= '{id: "'.$rowhh->url.'", text: "'.$rowhh->menu.'", img: "'.$rowhh->icono.'"},';
					$menu = trim($menu, ',');
					$menu .= ']},';
				}
				$menu = trim($menu, ',');
				$menu .= ']},';
			}
			$menu = trim($menu, ',');
			$menu .= ']';

			return $menu;
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
			$query = $this->db->get('menu');
			foreach($query->result() as $row)
				$combo[] = array("value" => $row->id_menu, "text" => $row->menu);

			return json_encode(array("options" => $combo));
		}
		catch(Exception $e)
		{
			log_message('error', $e->getMessage());
			return false;
		}
	}

	function listar()
	{
		try
		{
			$this->db->order_by('menu', 'asc');
			$query = $this->db->get('menu');
			foreach($query->result() as $row)
				$menu[$row->id_menu] = $row->menu;

			return json_encode(array("status" => true, "content" => $menu));
		}
		catch(Exception $e)
		{
			log_message('error', $e->getMessage());
			return false;
		}
	}

	function buscar($menu)
	{
		try
		{
			$query = $this->db->get_where('menu', array('id_menu_padre' => $menu));
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
