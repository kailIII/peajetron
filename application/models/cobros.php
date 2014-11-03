<?php
Class Cobros extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}

	function insertarQR($datos)
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
				$data = array('id_vehiculo' => $vehiculo[0]->id_vehiculo, 'id_usuario_propietario' => $vehiculo[0]->id_usuario, 'id_usuario_registra' => $datos['id_usuario'], 'id_peaje' => $datos['id_peaje'], 'valor' => $tarifa[0]->tarifa);
				$this->db->insert('cobro', $data);
				return 'Cruce registrado correctamente!';
			}
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
}
?>
