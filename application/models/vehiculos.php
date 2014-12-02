<?php
Class Vehiculos extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}

	function buscar($placa = null)
	{
		try
		{
			$query = $this->db->get_where('vehiculo', array('placa' => $placa));
			if($query->num_rows() > 0)
			{
				return $query->result();
			}
			else
			{
				return false;
			}
		}
		catch(Exception $e)
		{		
			log_message('error', $e->getMessage());
			return false;
		}
	}

	function buscarCategoria($categoria)
	{
		try
		{
			$query = $this->db->get_where('vehiculo', array('id_categoria' => $categoria));
			if($query->num_rows() > 0)
			{
				return false;
			}
			else
			{
				return true;
			}
		}
		catch(Exception $e)
		{		
			log_message('error', $e->getMessage());
			return false;
		}
	}

	function buscarEstado($estado)
	{
		try
		{
			$query = $this->db->get_where('vehiculo', array('id_estado_vehiculo' => $estado));
			if($query->num_rows() > 0)
			{
				return false;
			}
			else
			{
				return true;
			}
		}
		catch(Exception $e)
		{		
			log_message('error', $e->getMessage());
			return false;
		}
	}

	function insertar($datos)
	{
		try
		{
			$this->db->trans_begin();
			unset($datos['envia']);
			$datos['id_estado_vehiculo'] = 1;
			foreach($datos as $key => $value)
				if($datos[$key] == "")
					unset($datos[$key]);
			$this->db->insert('vehiculo', $datos);
			$this->db->trans_commit();

			return true;
		}
		catch(Exception $e)
		{
			$this->db->trans_rollback();
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
