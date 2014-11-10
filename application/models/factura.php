<?php
/**
 * Clase que se encarga de obtener toda la informacion de la entidad
 * Factura.
 * @author: Cristian Camilo Chaparro A.
*/
Class Factura extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}

	/**
	 * Lista todas las facturas emitidas para un usuario respecto
	 * a un vehículo en específico.
	 *
	 * @param $idVehiculo Identificador del vehículo.
	 * @param $idUsuario Identificador del usuario.
	 *
	 * @return Obtiene un result en caso que se obtengas resultados de lo contrario
	 *		   se retorna un false.
	 */
	public function listarHistorialPagos( $idVehiculo,$idUsuario )
	{

		$this->db->select('*');
		$this->db->from('factura');
		$this->db->where('factura.id_usuario', $idUsuario  );
		$this->db->join( 'vehiculo','vehiculo.id_usuario = factura.id_usuario' );
		$this->db->where('vehiculo.id_vehiculo', $idVehiculo );
		$query = $this->db->get();
		if( $query->num_rows() > 0 )
		{
			return $query->result()[0];
		}
		return false;
	}
/*
	public function ultimoPago($idUsuario)
	{

			$sql = 'SELECT * FROM  factura WHERE factura.id_usuario = '.$idUsuario;
			$query = $this->db->query( $sql );
			if( $query->num_rows() > 0 )
			{
				return $query->result();
			}
			return false;
	}

*/
	public function ultimoPago($idUsuario)
	{

	$sql = 'SELECT * FROM  factura WHERE id_usuario = '.$idUsuario.' AND "fechaPagado" IS NOT NULL';


		$query = $this->db->query( $sql );
		if( $query->num_rows() > 0 )
		{
			return $query->result();
		}
		return false;
	}

		public function ultimoMes($idUsuario, $idVehiculo)
	{

	    $sql = 'SELECT * FROM  factura WHERE id_usuario = '.$idUsuario.' AND id_vehiculo = '.$idVehiculo.' AND "fechaPagado" IS NULL';


		$query = $this->db->query( $sql );
		if( $query->num_rows() > 0 )
		{
			return $query->result()[0];
		}
		return false;
}
}
