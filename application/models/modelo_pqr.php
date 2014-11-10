<?php
class Modelo_pqr extends CI_Model{
	/**
	 * 
	 * Constructor del modelo
	 * 
	 * */
	function __construct(){
      parent::__construct();
   }
   /**
    * Obtiene la queja por el número de radicado
    * @param $radicado
    * @return $row
    * 
    * */
    
	function obtenerQueja($radicado, $usuario ){
		$where = "identificador = '".$radicado."' AND (usuarioingresa='".$usuario."' OR usuarioencargado='".$usuario."')";
		$query = $this->db->where($where);
		$query = $this->db->get('pqrs');
		return $query->row();
		}
		
	/**
	 * Obtiene el número de radicados por cada usuario
	 * @param string
	 * @return int
	 * 
	 * */
	function obtenerRadicado($usuario){
		$query = $this->db->where('usuarioingresa',$usuario);
		$query = $this->db->get('pqrs');
		return $query->num_rows();	
		}
	/**
	 * Registra una pqr con los datos
	 * 
	 * @param array()
	 * @return int
	 * 
	 * */
	function registrarDato($datos){		
		$this->db->insert('pqrs', $datos);
		return $this->db->affected_rows();
		}
	/**
	 * Obtiene el conjunto de quejas asignadas a un usuario
	 * @param string
	 * @return $query
	 * */
	function obtenerQuejaInv($usuario){		
		$query = $this->db->where('usuarioencargado',$usuario);
		$query = $this->db->where('tematerminado','0');
		$query = $this->db->get('pqrs');
		return $query;
		}
	/**
	 * Obtiene el usuario encargado a partir de la descripción del departamento
	 * @param string descripcion
	 * @return $query usuario
	 * */
	 function obtenerUsuarioEnc($descripcion){
		 $query = $this->db->where('descripciondepartamento',$descripcion);
		 $query = $this->db->get('usuarioencargado');
		 return $query->row();
		 }
	/**
	 * Obtiene el usuario encargado de invias para remision
	 * @param string descripcion
	 * @return $query usuario
	 * */
	 function obtenerUsuarioEncTodos(){
		 $query = $this->db->get('usuarioencargado');
		 return $query;
		 }
	/**
	 * Realiza la respuesta por parte de un usuario invias
	 * @param array($usuario string, $mensajeRespuesta string)
	 * @param $radicado string
	 * @return int 
	 * */	 
	 function responderQuejaInv($datos,$radicado){
		 $query=$this->db->where('identificador',$radicado);
		 $query=$this->db->update('pqrs',$datos);
		 return $this->db->affected_rows();
		 }
	/**
    * Obtiene la queja por el número de radicado
    * @param $radicado
    * @return $row
    * 
    * */
    
	function obtenerCorreo( $usuario ){
		
		$query = $this->db->where('id_usuario',$usuario);
		$query = $this->db->get('usuario');
		return $query->row();
		}
	
	}
?>
