<?php
Class Usuarios extends CI_Model
{
	function login($usuario, $contrasena)
	{
		$this->db->select('id_usuario, usuario.id_perfil, nombre, correo, activo, controlador');
		$this->db->from('usuario');
		$this->db->join('perfil', 'perfil.id_perfil = usuario.id_perfil');
		$this->db->where(array('correo' => $usuario, 'contrasena' => $contrasena));
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

	function insertar($datos, $contrasena)
	{
		try
		{
			$this->db->trans_begin();
			$data = array('id_perfil' => $datos['id_perfil'], 'id_tipo_documento' => $datos['id_tipo_documento'], 'id_ubicacion' => $datos['id_ubicacion'], 'documento' => $datos['documento'], 'nombre' => $datos['nombre'], 'correo' => $datos['correo'], 'contrasena' => md5($contrasena), 'telefono' => $datos['telefono'], 'direccion' => $datos['direccion']);
			$this->db->insert('usuario', $data);
			$this->db->trans_commit();

			return true;
		}
		catch(Exception $e)
		{
			$this->db->trans_rollback();

			return false;
		}
	}

	function combo()
	{
		$query = $this->db->get('usuario');
		foreach($query->result() as $row)
			$combo[] = array("value" => $row->id_usuario, "text" => $row->nombre);

		return json_encode(array("options" => $combo));
	}

	function listar()
	{
		$query  = $this->db->get('usuario');
		$result = $query->result();

		return json_encode($result);
	}

	function contrasena()
	{
		return substr(str_shuffle('abcdefghijklmnpqrstuvwxyzABCDEFGHIJKLMNPQRSTUVWXYZ123456789|!#$%¡+()=[]{}_'), 0, 8);
	}
}
?>
