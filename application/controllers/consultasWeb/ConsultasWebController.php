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
		if( empty( $listaAutos ) ){ //1 
			$data = array(
				'status' => FALSE,
			); //2
		}
		else
		{  //3
			$data = array(
					'listaAutos' => $listaAutos,
					'status' => TRUE,
			); 
		}
		$this->load->view( 'consultasWeb/templateHeaderView'); 	
		$this->load->view( 'consultasWeb/templateMenuView');
		$this->load->view( $pathView , $data ); //4
	}

	/**
	 * Funcionalidad que se encarga de obtener las placas de los vehículos
	 * asociadas a un usuario.
	*/
	public function getListaAutos()
	{
		$this->load->model('vehiculos');
		$results = $this->vehiculos->vehiculosPropietario( $this->getIdUsuario()  ) ;
		$listaAutos = array();
		if( $results !=FALSE )//1
		{
			foreach( $results as $vehiculo ){//2
				$auto = array();
			 	$auto[ 'id' ] 	  = $vehiculo->id_vehiculo;
				$auto[ 'placa' ]  = $vehiculo->placa ;
				$auto[ 'marca' ]  = $vehiculo->marca ;
				$auto[ 'modelo' ] = $vehiculo->modelo;
				$listaAutos [] = $auto;//3
			}
		}
		return $listaAutos;//4
	}
	/**
	 * Función que se encarga de obtener el identificador del usuario  sesión en el sistema.
	 *
	 * @return Identificador del usuario.
	*/
	public  function getIdUsuario(){
		$this->session = $this->session->userdata('peajetron');
		$idUsuario = $this->session['id_usuario'];//1
		return $idUsuario;//2
	}


}