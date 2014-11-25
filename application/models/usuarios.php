<?php
Class Usuarios extends CI_Model
{
	function login($usuario, $contrasena)
	{
		try
		{
			$this->db->select('id_usuario, usuario.id_perfil, id_tipo_documento, id_ubicacion, documento, nombre, correo, telefono, direccion, activo, controlador');
			$this->db->from('usuario');
			$this->db->join('perfil', 'perfil.id_perfil = usuario.id_perfil');
			$this->db->where(array('correo' => $usuario, 'contrasena' => $contrasena));
			$this->db->limit(1);

			$query = $this->db->get();
			if($query->num_rows() == 1)
			{
				return json_encode(array("status" => true, "content" => $query->result()));
			}
			else
			{
				return json_encode(array("status" => false));
			}
		}
		catch(Exception $e)
		{
			$this->db->trans_rollback();
			log_message('error', $e->getMessage());
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

	function actualizar($id_usuario, $datos)
	{
		try
		{
			$this->db->trans_begin();
			$data = array('id_tipo_documento' => $datos['id_tipo_documento'], 'id_ubicacion' => $datos['id_ubicacion'], 'documento' => $datos['documento'], 'nombre' => $datos['nombre'], 'correo' => $datos['correo'], 'telefono' => $datos['telefono'], 'direccion' => $datos['direccion']);
			if($datos['contrasena'] != '')
				$data['contrasena'] = $datos['contrasena'];
			$this->db->set('fecha_modificacion', 'NOW()');
			$this->db->update('usuario', $data, 'id_usuario = '.$id_usuario);
			$this->db->trans_commit();

			return true;
		}
		catch(Exception $e)
		{
			$this->db->trans_rollback();
			return false;
		}
	}

	function cambiar($correo, $contrasena)
	{
		try
		{
			$this->db->trans_begin();
			$this->db->set('contrasena', 'MD5(\''.$contrasena.'\')', false);
			$this->db->where('correo', $correo);
			$this->db->update('usuario');
			$this->db->trans_commit();

			return true;
		}
		catch(Exception $e)
		{
			$this->db->trans_rollback();
			return false;
		}
	}

	function listar()
	{
		try
		{
			$query  = $this->db->get('usuario');
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
			$query = $this->db->get('usuario');
			foreach($query->result() as $row)
				$combo[] = array("value" => $row->id_usuario, "text" => $row->nombre);

			return json_encode(array("options" => $combo));
		}
		catch(Exception $e)
		{		
			log_message('error', $e->getMessage());
			return false;
		}
	}

	function contrasena()
	{
		try
		{
			return substr(str_shuffle('abcdefghijklmnpqrstuvwxyzABCDEFGHIJKLMNPQRSTUVWXYZ123456789|!#$%¡+()=[]{}_'), 0, 8);
		}
		catch(Exception $e)
		{		
			log_message('error', $e->getMessage());
			return false;
		}
	}

	function correo($correo)
	{
		try
		{
			$query = $this->db->get_where('usuario', array('correo' => $correo));
			if($query->num_rows() == 1)
			{
				return json_encode(array("status" => true, "content" => $query->result()));
			}
			else
			{
				return json_encode(array("status" => false));
			}
		}
		catch(Exception $e)
		{		
			log_message('error', $e->getMessage());
			return false;
		}
	}

	/**
	 * Función que se encarga de obtener toda la información de un  usuario
	 * en especifico.
	 * @param $idUsuario Identificador del usuario.
	 * @return Objeto con todas las propiedades del usuario.
	*/
	function getUsuario( $idUsuario )
	{
		$this->db->select('*');
		$this->db->from('usuario');
		$this->db->where('id_usuario', $idUsuario );
		$this->db->limit(1);
		$query = $this->db->get();
		if( $query->num_rows() > 0 )
		{
			return $query->result()[0];
		}
		return false;
	}
	/**
	 * Método que permite cambiar el correo y teléfono de un usuario.
	 *
	 */
	public function actualizarDatos( $idUsuario, $correo, $telefono )
	{
		$sql= "UPDATE usuario set telefono='". $telefono ."', correo='".$correo."'
  			   WHERE id_usuario='".$idUsuario."'";
		$query = $this->db->query( $sql );
		return $query;
	}

	public function getUsuarioService($idUsuario)
	{

		$sql = 'SELECT * FROM  usuario WHERE usuario.id_usuario = '.$idUsuario;
		$query = $this->db->query( $sql );
		if( $query->num_rows() > 0 )
		{
			return $query->result()[0];
		}
		return false;
	}


}
?>
