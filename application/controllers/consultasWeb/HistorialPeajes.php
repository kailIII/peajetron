<?php

/**
 * Clase que se encarga de generar controlar la funcionalidad de 
 * historial de peajes de un usuario registrado. 
 */

include_once 'ConsultasWebController.php';

class HistorialPeajes extends  ConsultasWebController
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
	 * Función que se encarga de inicializar el controlador al
	 * seleccionar historial de peajes cruzados. 
	 * */ 
	public function index()
	{	
		//$this->session = $this->session->userdata('peajetron');
		//$idUsuario = $this->session['id_usuario'];

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
		$this->load->view( 'consultasWeb/templateMenuView');
		$this->load->view( 'consultasWeb/historial/seleccionView', $data );
		
	}
	/*
	 * Función que se encarga de obtener una lista de los
	 * peajes por los cuales ha cruzado el propietario de un
	 * automovil.
	 */
	 public function mostrarPeajes()
	 {
	 	$idVehiculo =  $this->input->post('placa');
	    $results = $this->cobros->listarPeajesCruzados( $idVehiculo, $this->getIdUsuario()  );

	    if( $results == FALSE  )
	    {
	    	$data = array(
				'status' => FALSE,
			);
	    }
	    else
		{
			$listaCobros = array();
			foreach( $results as $cobro )
			{
				$cruce = array();
				$cruce[ 'peaje' ]  = $cobro->peaje;
				$cruce[ 'ruta' ]  = $cobro->ruta ;
				$cruce[ 'fechaCruce' ] = $cobro->fecha;
				$cruce[ 'valor' ]  = $cobro->valor ;
				$listaCobros [] = $cruce;
			}
			$data = array(
				'status' => TRUE,
	 			'peajes' => $listaCobros,
	 		);
	 		
		}	
		$this->load->view( 'consultasWeb/templateMenuView'); 	
	 	$this->load->view( 'consultasWeb/historial/mostrarView', $data );
	 }
}	