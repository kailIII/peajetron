<?php

include_once 'consultasWebController.php';
/*
 * Clase que se encarga de mostrar la información acerca del
 * último peaje por el cual cruzo un vehículo en especifico.
 *
*/
class UltimoPeaje extends   ConsultasWebController
{
	/*
	 * Constructor de la clase.
	 */
	public function __construct(){
		parent::__construct();
		$this->load->model('vehiculos');
		$this->load->model('cobros');
	}
	/*
	 * Función que se encarga de inicializar el controlador
	 */
	public function  index()
	{
		$this->inicializar( 'consultasWeb/ultimoPeaje/seleccionView' );
	}
	/*
	 * Función que se encarga de mostrar el último peaje por el cual cruzo
	 * un vehículo.
	 *
	 * */
	public function mostrarUltimoPeaje(){
		$idVehiculo =  $this->input->post('placa');
		$vehiculo = $this->vehiculos->buscarById( $idVehiculo );
		$data = array(
			'placa'  => $vehiculo->placa,
	 		'marca'  => $vehiculo->marca ,
	 		'modelo' => $vehiculo->modelo,
		);
		$cobro = $this->cobros->ultimoPeajeCruzado( $idVehiculo , $this->getIdUsuario() );
		if( $cobro == FALSE ){//1
			$data['status'] =  FALSE; //2
		}
		else
		{
			$cruce = array();
			$cruce[ 'peaje' ]      = $cobro->peaje;
			$cruce[ 'ruta' ]       = $cobro->ruta ;
			$cruce[ 'fechaCruce' ] = $cobro->fecha;
			$cruce[ 'hora' ]       = $cobro->hora;
			$cruce[ 'valor' ]      = $cobro->valor;

			$data['status'] =  TRUE;
			$data['peaje'] =  $cruce;//3
		}
		$this->load->view( 'consultasWeb/templateHeaderView');
		$this->load->view( 'consultasWeb/templateMenuView');
		$this->load->view( 'consultasWeb/ultimoPeaje/mostrarView', $data );//4
	}
}
