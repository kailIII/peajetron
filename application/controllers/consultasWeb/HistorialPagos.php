<?php
/*
 * Controlador que se encarga de generar el historial de pagos 
 * de un usuario 
 * */
include_once 'ConsultasWebController.php';

class HistorialPagos extends  ConsultasWebController
{
	/*
	 * Constructor de la clase.
	 */
	public function __construct(){
		parent::__construct();
		
	}
	/*
	 * Método que inicializa el controlador de historial de pagos.
	 * 
	 * */
	public function index()
	{
		$this->inicializar('consultasWeb/historialPagos/seleccionView');	
	}
	/*
	 * Función que se encarga de mostrar los pagos que ha realizado una persona
	 * sobre un vehículo en especifico.
	 * */
	public function mostrarPagos()
	{
		
		$data = array(
				'pagos' => array(
					array('fechaCorte' => '20-01-2014','fechaPago' =>'10-01-2014', 'codigo' => '001', 'valor' => '10000' ),
					array('fechaCorte' => '20-02-2014','fechaPago' =>'10-01-2014', 'codigo' => '002', 'valor' => '50000' ),
				),
		);
		$this->load->view( 'consultasWeb/historialPagos/mostrarView', $data );
		
	}
}