<?php

include_once 'consultasWebController.php';
/**
 * Clase que se encarga de  generar la funcionalidad
 * para mostrar el último valor a pagar del mes.
*/


class ValorUltimoMes extends  ConsultasWebController{
	/*
	 * Constructor de la clase.
	 */
	public function __construct(){
		parent::__construct();
		$this->load->model('vehiculos');
		$this->load->model('cobros');
		#
	}
	/**
	 * Métod que se encarga de inicializar el controlador.
	 */
	public function index(){
		$this->inicializar( 'consultasWeb/valorUltimoMes/seleccionView' );
	}
	 /**
	  * Función que se encarga de mostrar cual fue el último valor a pagar.
	  */
	public function mostrar(){
		$idVehiculo =  $this->input->post('placa');
		$vehiculo = $this->vehiculos->buscarById( $idVehiculo );
		$data = array(
			'placa'  => $vehiculo->placa,
	 		'marca'  => $vehiculo->marca ,
	 		'modelo' => $vehiculo->modelo,
		);
	    $valor = $this->cobros->valorUlitmoMes( $idVehiculo, $this->getIdUsuario()  );
	    if( $valor == FALSE )//1
	    {
	    	$data[ 'status' ] = FALSE;//2
	    }
	    else{
	    	$data[ 'status' ] = TRUE;
	    	$data[ 'valor' ] = $valor->sum;//3
	    }
	   	$menu = $this->getMenu();
		$this->load->view( 'consultasWeb/templateHeaderView');
		$this->load->view( 'consultasWeb/templateMenuView', $menu );
		$this->load->view( 'consultasWeb/valorUltimoMes/mostrarView', $data );//4
	}
}
