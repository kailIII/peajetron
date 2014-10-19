<?php
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
	public function listarHistorialPagos( $idUsuario )
	{
		$sql = 'SELECT * FROM  factura as f WHERE  f.id_usuario= ' . $idUsuario;
		$query = $this->db->query( $sql );
		if( $query->num_rows() > 0 )
		{
			return $query->result();
		}
		return false;	
	}
}

