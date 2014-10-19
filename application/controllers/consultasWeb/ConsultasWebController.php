<?php

Class ConsultasWebController extends  CI_Controller
{	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('vehiculos');
	}
	/**
	 * Función que se encarga de inicializar la vista para 
	 * cargar en la vista la lista de placas del vehículo.
	*/
	public function inicializar( $pathView ){
		$listaAutos = $this->getListaAutos();

		if( empty( $listaAutos ) ){
			$data = array(
					'status' => FALSE,
			);
		}
		else
		{
			$data = array(
					'listaAutos' => $listaAutos,
					'status' => TRUE,
			);
		}
		$this->load->view( 'consultasWeb/templateHeaderView'); 	
		$this->load->view( 'consultasWeb/templateMenuView');
		$this->load->view( $pathView , $data );
	}

	/**
	 * Funcionalidad que se encarga de obtener las placas de los vehículos
	 * asociadas a un usuario.
	*/
	protected function getListaAutos()
	{
		//$this->session = $this->session->userdata('peajetron');
		//$idUsuario = $this->session['id_usuario'];
		$this->load->model('vehiculos');
		$results = $this->vehiculos->vehiculosPropietario( 1032 ) ;

		$listaAutos = array();
		if( $results !=FALSE )
		{
			
			foreach( $results as $vehiculo ){
				$auto = array();
			 	$auto[ 'id' ] 	  = $vehiculo->id_vehiculo;
				$auto[ 'placa' ]  = $vehiculo->placa ;
				$auto[ 'marca' ]  = $vehiculo->marca ;
				$auto[ 'modelo' ] = $vehiculo->modelo;
				$listaAutos [] = $auto;
			}
		}
		return $listaAutos;
	}
	/**
	 * Función que se encarga de obtener el identificador del usuario  sesión en el sistema.
	 *
	 * @return Identificador del usuario.
	*/
	protected function getIdUsuario(){
		return 1032;
	}


}