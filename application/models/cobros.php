<?php
Class Cobros extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}

	function insertar($datos)
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
}
?>
