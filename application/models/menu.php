<?php
Class Menu extends CI_Model
{
	function ensamblar($perfil)
	{
		$this->db->select('id_menu, menu, url, icono');
		$this->db->from('menu');
		$this->db->where('id_menu_padre IS NULL', null);
		$this->db->order_by('orden');

		$menu = '[';
		$menup = $this->db->get();
		foreach($menup->result() as $rowp) {
			$menu .= '{id: "m'.$rowp->id_menu.'", text: "'.$rowp->menu.'", img: "'.$rowp->icono.'", items: [';
			$this->db->select('id_menu, menu, url, icono');
			$this->db->from('menu');
			$this->db->where('id_menu_padre', $rowp->id_menu);
			$this->db->order_by('orden');
			$menuh = $this->db->get();
			foreach($menuh->result() as $rowh)
				$menu .= '{id: "m'.$rowh->id_menu.'", text: "'.$rowh->menu.'", img: "'.$rowh->icono.'"},';
			$menu .= ']},';
		}
		$menu .= ']';

		return $menu;
	}
}
?>
