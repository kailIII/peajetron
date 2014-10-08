<?php
Class Usuarios extends CI_Model
{
	function login($usuario, $contrasena)
	{
		$this->db->select('id_usuario, usuario.id_perfil, nombre, correo, activo, controlador');
		$this->db->from('usuario');
		$this->db->join('perfil', 'perfil.id_perfil = usuario.id_perfil');
		$this->db->where('correo', $usuario);
		$this->db->where('contrasena', $contrasena);
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
