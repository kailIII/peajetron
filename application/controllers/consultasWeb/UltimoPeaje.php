<?php

/*
 * Clase que se encarga de mostrar la información acerca del 
 * último peaje por el cual cruzo un vehículo en especifico.
 * */
class UltimoPeaje extends  CI_Controller
{
	/*
	 * Constructor de la clase.
	 */
	public function __construct(){
		parent::__construct();
	}
	/*
	 * Función que se encarga de inicializar el controlador
	 */
	public function  index()
	{
		$data = array(
				'listaAutos' => array(
						array('placa' => '123-ABC','marca' =>'Audi', 'modelo' => 'RQS' ),
						array('placa' => '987-ABC','marca' =>'Audi', 'modelo' => 'TT' )
				),
		);

		$this->load->view( 'consultasWeb/templateMenuView');
		$this->load->view( 'consultasWeb/ultimoPeaje/seleccionView', $data );
	}
	/*
	 * Función que se encarga de mostrar el último peaje por el cual cruzo
	 * un vehículo. 
	 * 
	 * */
	public function mostrarUltimoPeaje(){
		$placa =  $this->input->post('placa');
		$data = array(
			'placa' => $placa,
		);
		$this->load->view( 'consultasWeb/ultimoPeaje/mostrarView', $data );
	}
}