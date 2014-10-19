<?php
Class Vehiculos extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}

	function buscar($placa = null, $id_vehiculo = null)
	{
		$this->db->select('*');
		$this->db->from('vehiculo');
		$this->db->where('placa', $placa);
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

	function buscarById( $idVehiculo )
	{
		$sql = "SELECT * FROM vehiculo as v WHERE v.id_vehiculo=" .$idVehiculo ;
		$query = $this->db->query( $sql );
		if( $query->num_rows() > 0 )
		{
			return $query->result()[0];
		}
		return false;
	}

	/**
	 * Método que se encarga de buscar los vehículos que le 
	 * pertenecen a un usuario en especifico. 
	 *
	 * @param idusuario Identificador del usuario del cual traer los vehículos. 
	 * @return Obtiene un result en caso que se obtengas resultados de lo contrario
	 *		   se retorna un false. 
	 */
	function vehiculosPropietario( $idusuario )
	{
		$sql = "SELECT * FROM vehiculo as v, usuario as u 
						 WHERE v.id_usuario = u.id_usuario 
						 AND u.id_usuario = ". $idusuario ;
		$query = $this->db->query( $sql );
		if( $query->num_rows() > 0 )
		{
			return $query->result();
		}
		return false;
	}
}