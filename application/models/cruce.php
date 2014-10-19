<?php
Class Cruce extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}
	/**
	 * Obtiene la lista de peajes por los cuales ha cruzado 
	 * un vehiculo respecto a un usuario.
	 *
	 * @param $idVehiculo Identificador del vehículo. 
	 * @param $idUsuario Identificador del usuario.
	 * @return Obtiene un result en caso que se obtengas resultados de lo contrario
	 *		   se retorna un false. 
	 */
	public function listarPeajesCruzados( $idVehiculo, $idUsuario  )
	{
		$sql = "SELECT * FROM cruce as c, usuario as u, vehiculo as v WHERE  u.id_usuario = v.id_usuario AND c.id_vehiculo = v.id_vehiculo";
		$query = $this->db->query( $sql );
		if( $query->num_rows() > 0 )
		{
			return $query->result();
		}
		return false;
	}

	/**
	 * Obtiene la lista de peajes por los cuales ha cruzado 
	 * un vehiculo respecto a un usuario.
	 *
	 * @param $idVehiculo Identificador del vehículo. 
	 * @param $idUsuario Identificador del usuario.
	 * @return Obtiene un result en caso que se obtengas resultados de lo contrario
	 *		   se retorna un false. 
	 */
	public function listarPeajesCruzadosFecha( $idVehiculo, $idUsuario , $fechaInicial, $fechaFinal )
	{
		$sql = "SELECT * FROM cruce as c, usuario as u, vehiculo as v 
				WHERE  u.id_usuario = v.id_usuario 
				  	   AND c.id_vehiculo = v.id_vehiculo 
				  	   AND c.fecha BETWEEN " .$fechaInicial . " AND " . $fechaFinal;

		$query = $this->db->query( $sql );
		if( $query->num_rows() > 0 )
		{
			return $query->result();
		}
		return false;
	}


	/**
	 * Obtiene el último peaje por el cual cruzó un vehículo específico 
	 * de un usuario. 
	 *
	 * @param $idVehiculo Identificador del vehículo. 
	 * @param $idUsuario Identificador del usuario.
	 *
	 * @return Obtiene un result en caso que se obtengas resultados de lo contrario
	 *		   se retorna un false. 
	*/
	public function ultimoPeajeCruzado( $idVehiculo, $idUsuario )
	{
		$sql = 'SELECT FROM cruce as c, usuario as u, vehiculo as v 
					   WHERE c.id_vehiculo = v.id_vehiculo AND v.id_usuario = u.id_usuario 
					   ORDER BY c.fecha DESC LIMIT 1';
		$query = $this->db->query( $sql );
		if( $query->num_rows() > 0 )
		{
			return $query->result()[0];
		}
		return false;		   
	}

	/**
	 * Se obtiene el valor que debe pagar un propietar de un vehículo específico respecto al último mes 
	 * se realiza un cálculo parcial hasta la fecha.
     *
	 * @param $idVehiculo Identificador del vehículo. 
	 * @param $idUsuario Identificador del usuario.
	 *
	 * @return Obtiene un result en caso que se obtengas resultados de lo contrario
	 *		   se retorna un false. 
	 */
	public function valorUlitmoMes( $idVehiculo, $idUsuario )
	{
		$sql = '';
		$query = $this->db->query( $sql );
		if( $query->num_rows() > 0 )
		{
			return $query->result();
		}
		return false;	
	}

}