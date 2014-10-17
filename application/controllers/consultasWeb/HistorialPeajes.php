<?php

/**
 * Clase que se encarga de generar controlar la funcionalidad de 
 * historial de peajes de un usuario registrado. 
 */
class HistorialPeajes extends  CI_Controller
{
	/*
	 * Constructor de la clase.
	 */
	public function __construct(){
		parent::__construct();
		//$this->load->model('consultasWeb/HistorialPeajesModel');
		
	}
	/*
	 * Función que se encarga de inicializar el controlador al
	 * seleccionar historial de peajes cruzados. 
	 * */ 
	public function index()
	{	
		$session = $this->session->userdata('peajetron');
		$data = array(
			'user' => $session,
			'listaAutos' => array(
				array('placa' => '123-ABC','marca' =>'Audi', 'modelo' => 'RQS' ),
			    array('placa' => '987-ABC','marca' =>'Audi', 'modelo' => 'TT' )
			),
        );
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
	 	$placa =  $this->input->post('placa');
	 	$data = array(
	 		'placa' => $placa,
	 		'peajes' => array(
	 			array('peaje' => 'Bogotá', 		  'ruta' => 'Ruta 1', 'fechaCruce'=>'2014-12-04', 'valor'=> '$8.000' ),
	 			array('peaje' => 'Villavicencio', 'ruta' => 'Ruta 2', 'fechaCruce'=>'2014-12-04', 'valor'=> '$5.000' ),
	 			array('peaje' => 'Cartagena', 	  'ruta' => 'Ruta 3', 'fechaCruce'=>'2014-12-04', 'valor'=> '$18.000' ),		
	 		)
	 	);
	 	$this->load->view( 'consultasWeb/historial/mostrarView', $data );
	 }
}	