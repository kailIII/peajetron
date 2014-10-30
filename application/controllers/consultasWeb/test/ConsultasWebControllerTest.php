<?php

include_once 'ConsultasWebController.php';

class ConsultasWebControllerTest extends  CI_Controller{

	private $controller;

	public function __construct()
	{
		parent::__construct();
		$this->load->library('unit_test');
	}
	public function testGetIdUsuario()
	{
		$sess_array = array(
			'id_usuario' => '1032', 
			'id_perfil' => '3', 
			'nombre' => 'cristian', 
			'correo' => 'cristianchaparroa@gmail.com', 
			'activo' => TRUE, 
			'controlador' => 'controlador' );

        $this->session->set_userdata('peajetron', $sess_array);
		$controller = new ConsultasWebController();
		$test = $controller->getIdUsuario();
		echo $this->unit->run($test, '1032', 'Test de identificacion en el sistema');
	}
	public function index(){
		//$this->testGetIdUsuario();
	}
}