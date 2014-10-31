<?php
error_reporting(-1);
ini_set('display_errors', 'On');

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
}
?>
