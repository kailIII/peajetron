<?php
Class Cobros extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}

	function insertarQR($datos)
	{
		try
		{
			$this->load->model('vehiculos', '', TRUE);
			$this->load->model('tarifas', '', TRUE);

			$placa = preg_split('/\r\n|[\r\n]/', $datos['vcard']);
			$placa = explode(":", $placa[2]);
	    $vehiculo = $this->vehiculos->buscar($placa[1]);
			if($vehiculo)
			{
				$tarifa = $this->tarifas->buscar($datos['id_peaje'], $vehiculo[0]->id_categoria);
				if($tarifa)
				{
					$this->db->trans_begin();
					$data = array('id_vehiculo' => $vehiculo[0]->id_vehiculo, 'id_usuario_propietario' => $vehiculo[0]->id_usuario, 'id_usuario_registra' => $datos['id_usuario'], 'id_peaje' => $datos['id_peaje'], 'valor' => $tarifa[0]->tarifa);
					$this->db->insert('cobro', $data);
					$this->db->trans_commit();
					return 0;
				}
				else
					return 1; //Peaje-Categoria sin valor
			}
			else
			{
				$this->db->trans_rollback();
				return 2; //Vehiculo del QR no existe
			}
		}
		catch(Exception $e)
		{
			$this->db->trans_rollback();
			log_message('error', $e->getMessage());
			return 3; //Error de ejecucion
		}
	}

	function insertarPlaca($datos)
	{
		try
		{
			$this->load->model('vehiculos', '', TRUE);
			$this->load->model('tarifas', '', TRUE);

	    $vehiculo = $this->vehiculos->buscar($datos['placa']);
			if($vehiculo)
			{
				if($vehiculo[0]->id_categoria != '')
					$tarifa = $this->tarifas->buscar($datos['id_peaje'], $vehiculo[0]->id_categoria);
				else
					$tarifa[0]->tarifa = -1;
				if($tarifa)
				{
					$this->db->trans_begin();
					$data = array('id_vehiculo' => $vehiculo[0]->id_vehiculo, 'id_usuario_propietario' => $vehiculo[0]->id_usuario, 'id_usuario_registra' => $datos['id_usuario'], 'id_peaje' => $datos['id_peaje'], 'valor' => $tarifa[0]->tarifa);
					$this->db->insert('cobro', $data);
					$this->db->trans_commit();

					return true;
				}
			}
			else
			{
				$datosv = array('id_estado_vehiculo' => 1, 'placa' => $datos['placa']);
				$result = $this->vehiculos->insertar($datosv);
				if($result)
				{
					$this->db->trans_begin();
					$id_vehiculo = $this->db->insert_id();
					$data = array('id_vehiculo' => $id_vehiculo, 'id_usuario_registra' => $datos['id_usuario'], 'id_peaje' => $datos['id_peaje'], 'valor' => -1);
					$this->db->insert('cobro', $data);
					$this->db->trans_commit();

					return true;
				}
				return false;
			}
		}
		catch(Exception $e)
		{
			$this->db->trans_rollback();
			log_message('error', $e->getMessage());
			return false;
		}
	}
}
?>
