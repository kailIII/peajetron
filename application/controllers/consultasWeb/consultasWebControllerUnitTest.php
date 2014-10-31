<?php

include_once( 'consultasWebController.php' );

/**
 * Clase que se encarga de ejecutar pruebas unitarias de caja Negra
 *
*/
class ConsultasWebControllerUnitTest extends  CI_Controller
{
  /**
	 * Instancia del controlador que se va emplear a traves de la clase.
	*/
	private $controller;

	public function __construct()
	{
		parent::__construct();
		$this->load->library('unit_test');
	}
	/**
	 * Método que prueba si la identificación  de un usuario retorna
	 * la identificacion del usuario en el sistema.
	 *
	 * @cover: getIdUsuario
	*/
	public function testGetIdUsuario()
	{
		$sess_array = array(
			'id_usuario' => '1032',
			'id_perfil' => '3',
			'nombre' => 'cristian',
			'correo' => 'cristianchaparroa@gmail.com',
			'activo' => TRUE,
			'controlador' => 'controlador' );

		$this->session->set_userdata( 'peajetron', $sess_array );
		$this->controller = new  ConsultasWebController();
		$test = $this->controller->getIdUsuario();
		echo $this->unit->run($test, '1032', 'Test identificacion de usuario');
	}
	/**
 	 * Método que se encarga de validar la lista de autos que tiene un usuario.
	 *
	 * @cover: getListaAutos
	 */
	public function testGetListaAutos()
	{
		$sess_array = array(
			'id_usuario' => '1032',
			'id_perfil' => '3',
			'nombre' => 'cristian',
			'correo' => 'cristianchaparroa@gmail.com',
			'activo' => TRUE,
			'controlador' => 'controlador' );

		$this->session->set_userdata( 'peajetron', $sess_array );
		$this->controller = new  ConsultasWebController();
		$test = $this->controller->getIdUsuario();
		echo $this->unit->run( count($test), 1, 'Contar la cantidad de vehiculos que pertnecen a un usuario');
	}

	/**
	 * Método que permite ejecutar las pueblas establecidas
	 * en esta clase.
	*/
	public function index()
	{
		$this->testGetIdUsuario();
		$this->testGetListaAutos();
	}

}
