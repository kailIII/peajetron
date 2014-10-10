<?php

/*s
 * Clase que se encarga de Controlar los eventos generados
 * en la vista Historial de peajes cruzados por fechas.
 * */
class HistorialPeajesFecha extends  CI_Controller
{
	/*
	 * Variable en la cual se aloja el facha inicial seleccionada
	 * por el usuario para realizar el filtro por fechas para obtener
	 * los peajes cruzados de un vehículo.
	 */
	private $fechaInicial;
	/*
	 * Variable en la cual se aloja el facha final seleccionada
	 * por el usuario para realizar el filtro por fechas para obtener
	 * los peajes cruzados de un vehículo.
	 */
	private $fechaFinal;
	/*
	 * Constructor de la clase.
	 */
	public function __construct(){
		parent::__construct();
		$this->load->helper( array('url','form') );
		$this->load->library('form_validation');
	}
	/*
	 * Función que se encarga de inicializar el controlador al
	 * seleccionar historial de peajes cruzados por fechas.
	 * */
	public function index()
	{
		$data = array(
				'listaAutos' => array(
						array('placa' => '123-ABC','marca' =>'Audi', 'modelo' => 'RQS' ),
						array('placa' => '987-ABC','marca' =>'Audi', 'modelo' => 'TT' )
				),
		);
		$this->load->view( 'consultasWeb/templateMenuView');
		$this->load->view( 'consultasWeb/historialFecha/seleccionView', $data );
	}
	/*
	 * Método el cual se encarga de capturar las fechas que ha seleccionado
	 * el usuario para filtrar los peajes cruzados por un vehículo.
	 * */
	public function seleccioneFecha()
	{
		$this->fechaInicial = $this->input->post('fechaInicial');
		$this->fechaFinal   = $this->input->post('fechaFinal');
		
		$data = array();
		$this->load->view( 'consultasWeb/templateMenuView', $data );
		$this->load->view( 'consultasWeb/historialFecha/seleccioneFechaView', $data );
	}
	/*
	 * Función que se encarga de obtener una lista de los
	 * peajes por los cuales ha cruzado el propietario de un
	 * automovil.
	 */
	public function mostrarPeajes(){
		$placa =  $this->input->post('placa');
		$data = array(
				'placa' => $placa,
				'peajes' => array(
						array('peaje' => 'Bogotá', 		  'ruta' => 'Ruta 1', 'fechaCruce'=>'2014-12-04', 'valor'=> '$8.000' ),
						array('peaje' => 'Villavicencio', 'ruta' => 'Ruta 2', 'fechaCruce'=>'2014-12-04', 'valor'=> '$5.000' ),
						array('peaje' => 'Cartagena', 	  'ruta' => 'Ruta 3', 'fechaCruce'=>'2014-12-04', 'valor'=> '$18.000' ),
				)
		);
		$this->load->view( 'consultasWeb/templateMenuView', $data );
		$this->load->view( 'consultasWeb/historial/mostrarView', $data );
	}
}