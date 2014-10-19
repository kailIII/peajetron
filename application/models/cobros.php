<?php
Class Cobros extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}

	function insertarQR($datos)
	{
		$placa = preg_split('/\r\n|[\r\n]/', $datos['vcard']);
		$placa = explode(":", $placa[2]);
    $result = $this->vehiculos->buscar($placa[1]);
		if($result)
		{
      foreach($result as $row)
			{
				$data = array('id_vehiculo' => $row->id_vehiculo, 'id_usuario_propietario' => $row->id_usuario, 'id_usuario_registra' => $datos['id_usuario'], 'id_peaje' => $datos['id_peaje'], 'valor' => 0);
				$this->db->insert('cobro', $data);
			}
			return 'Cruce registrado correctamente!';
		}
		else
		{
			return 'El vehículo no existe';
		}
	}

	function insertarPlaca($datos)
	{
		return 'Cruce registrado correctamente!';
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
		$sql = "SELECT p.peaje, r.ruta, DATE(c.fecha_registro) as fecha,  to_char(c.fecha_registro, 'HH24:MI') as hora,c.valor 
					FROM cobro as c, usuario as u, vehiculo as v, peaje as p, ruta as r 
					WHERE  u.id_usuario = v.id_usuario 
					AND c.id_vehiculo = v.id_vehiculo
					AND c.id_peaje  = p.id_peaje
					AND p.id_ruta = r.id_ruta
					ORDER BY c.fecha_registro DESC";

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
		$this->db->query( 'SET DateStyle TO European' );
		$sql = "SELECT p.peaje, r.ruta, DATE(c.fecha_registro) as fecha, 
					to_char(c.fecha_registro, 'HH24:MI') as hora, c.valor 
					FROM cobro as c, usuario as u, vehiculo as v, peaje as p, ruta as r 
					WHERE  u.id_usuario = v.id_usuario 
					AND c.id_vehiculo = v.id_vehiculo
					AND c.id_peaje  = p.id_peaje
					AND p.id_ruta = r.id_ruta
				  	AND DATE(c.fecha_registro) BETWEEN '" .$fechaInicial . "' AND '" . $fechaFinal . 
				  	"' ORDER BY c.fecha_registro DESC";

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
		$sql = "SELECT p.peaje, r.ruta, DATE(c.fecha_registro) as fecha, 
						to_char(c.fecha_registro, 'HH24:MI') as hora, 
						c.valor 
						FROM cobro as c, usuario as u, vehiculo as v, peaje as p, ruta as r 
						 WHERE c.id_vehiculo = v.id_vehiculo 
						 AND v.id_usuario = u.id_usuario 
						 AND c.id_peaje  = p.id_peaje
						 AND p.id_ruta = r.id_ruta
						 AND v.id_vehiculo = " . $idVehiculo. "
						 AND u.id_usuario  = ". $idUsuario."
						 ORDER BY c.fecha_registro DESC LIMIT 1 ";
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
?>
