<?php
Class Menu extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}

	function ensamblar($perfil)
	{
		$this->db->select('menu.id_menu, menu, url, icono');
		$this->db->from('perfil_menu');
		$this->db->join('menu', 'menu.id_menu = perfil_menu.id_menu');
		$this->db->where('id_menu_padre IS NULL', null);
		$this->db->where('id_perfil', $perfil);
		$this->db->order_by('orden');

		$menu = '[';
		$menup = $this->db->get();
		foreach($menup->result() as $rowp) {
			$menu .= '{id: "m'.$rowp->id_menu.'", text: "'.$rowp->menu.'", img: "'.$rowp->icono.'", items: [';
			$this->db->select('menu.id_menu, menu, url, icono');
			$this->db->from('perfil_menu');
			$this->db->join('menu', 'menu.id_menu = perfil_menu.id_menu');
			$this->db->where('id_menu_padre', $rowp->id_menu);
			$this->db->where('id_perfil', $perfil);
			$this->db->order_by('orden');
			$menuh = $this->db->get();
			foreach($menuh->result() as $rowh)
				$menu .= '{id: "'.$rowh->url.'", text: "'.$rowh->menu.'", img: "'.$rowh->icono.'"},';
			$menu .= ']},';
		}
		$menu .= ']';

		return $menu;
	}
}
?>
