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
	 * @cover: 1,2,3
	*/
  public function testInicializar1(){
		$sess_array = array(
			'id_usuario' => '1026564980',
			'id_perfil' => '3',
			'nombre' => 'Fabian Caicedo',
			'correo' => 'fayan@gmail.com',
			'activo' => TRUE,
			'controlador' => 'controlador' );
		$this->session->set_userdata( 'peajetron', $sess_array );
		$this->controller = new  ConsultasWebController();
	//1	$test = $this->controller->inicializar(  );
	//2	$test = $this->controller->inicializar( '' );
	//3	$test = $this->controller->inicializar( 'consultasWeb/historial/seleccionView' );
	}
	/**
	 *@cover: 4,5,6,
	*/
	public function testInicializar2(){
		$sess_array = array(
			'id_usuario' => '1032',
			'id_perfil' => '3',
			'nombre' => 'cristian',
			'correo' => 'cristianchaparroa@gmail.com',
			'activo' => TRUE,
			'controlador' => 'controlador' );
		$this->session->set_userdata( 'peajetron', $sess_array );
		$this->controller = new  ConsultasWebController();
		//4 $test = $this->controller->inicializar();
		//5 $test = $this->controller->inicializar( '' );
		$test = $this->controller->inicializar( 'consultasWeb/historial/seleccionView' );
	}

	/**
		* Método que se encarga de validar la lista de autos que tiene un usuario.
	  *
	  * @cover: getListaAutos, 7,8
	  */
	public function testGetListaAutos()
	{
		//7
		$sess_array = array(
			'id_usuario' => '1026564980',
			'id_perfil' => '3',
			'nombre' => 'Fabian Caicedo',
			'correo' => 'fayan@gmail.com',
			'activo' => TRUE,
			'controlador' => 'controlador' );

		$this->session->set_userdata( 'peajetron', $sess_array );
		$this->controller = new  ConsultasWebController();
		$test = $this->controller->getListaAutos();
		var_dump( $test );
		echo $this->unit->run( count($test), 0, 'Contar la cantidad de vehiculos que pertnecen a un usuario');

		//8
		// $sess_array = array(
		// 	'id_usuario' => '1032',
		// 	'id_perfil' => '3',
		// 	'nombre' => 'cristian',
		// 	'correo' => 'cristianchaparroa@gmail.com',
		// 	'activo' => TRUE,
		// 	'controlador' => 'controlador' );
		//
		// $this->session->set_userdata( 'peajetron', $sess_array );
		// $this->controller = new  ConsultasWebController();
		// $test = $this->controller->getListaAutos();
		// echo $this->unit->run( count($test), 1, 'Contar la cantidad de vehiculos que pertnecen a un usuario');

	}


	/**
	 * Método que permite ejecutar las pueblas establecidas
	 * en esta clase.
	*/
	public function index()
	{
		//$this->testInicializar1();
		//$this->testInicializar2();
		//$this->testGetListaAutos();
	}

}
