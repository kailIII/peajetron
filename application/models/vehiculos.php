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

	/**
	 * Función que se encarga de obtener todas los campos de un vehículo
	 * @param $idVehiculo Identificación del vehículo
	 * @return Objeto con los campos de un vehículo.
	*/
	function buscarById( $idVehiculo )
	{
		if( $idVehiculo !='' )
		{
				$this->db->select('*');
				$this->db->from('vehiculo');
				$this->db->where('id_vehiculo', $idVehiculo);
				$this->db->limit(1);
				$query = $this->db->get();
				if( $query->num_rows() > 0 )
				{
					return $query->result()[0];
				}
		}

		return false;
	}

	/**
	 * Método que se encarga de buscar los vehículos que le
	 * pertenecen a un usuario en específico.
	 *
	 * @param idusuario Identificador del usuario del cual traer los vehículos.
	 * @return Obtiene un result en caso que se obtengas resultados de lo contrario
	 *		   se retorna un false.
	 */
	function vehiculosPropietario( $idusuario )
	{

		$this->db->select('*');
		$this->db->from( 'vehiculo');
		$this->db->join('usuario', 'usuario.id_usuario = vehiculo.id_usuario' );
		$this->db->where('usuario.id_usuario', $idusuario  );
		$query = $this->db->get();
		if( $query->num_rows() > 0 )
		{
			return $query->result();
		}
		return false;
	}
}
