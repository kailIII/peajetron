<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

session_start();
require_once('application/third_party/dhtmlx/sources/dhtmlxConnector/codebase/grid_connector.php');
require_once('application/third_party/dhtmlx/sources/dhtmlxConnector/codebase/db_phpci.php');
DataProcessor::$action_param = 'dhx_editor_status';

class Usuario extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		if($this->session->userdata('peajetron'))
		{
			$this->load->model('menu', '', TRUE);
			$this->load->model('usuarios', '', TRUE);
		}
		else
		{
			redirect('login', 'refresh');
		}
	}

	function index()
	{
			$session = $this->session->userdata('peajetron');
			$menu['menu'] = $this->menu->ensamblar($session['id_perfil']);
			$data['titulo'] = 'Usuario: '.$session['nombre'];
			$this->load->view('front/head.php', $data);
			$this->load->view('front/header.php');
			$this->load->view('menu', $menu);
			$this->load->view('perfil');
			$this->load->view('front/footer.php');
	}

	function crear()
	{
			$session = $this->session->userdata('peajetron');
			$menu['menu'] = $this->menu->ensamblar($session['id_perfil']);
			$data['titulo'] = 'Usuario: '.$session['nombre'];
			$this->load->view('front/head.php', $data);
			$this->load->view('front/header.php');
			$this->load->view('menu', $menu);
			$this->load->view('perfil');
			$this->load->view('front/footer.php');
	}

	function listar()
	{
		$session = $this->session->userdata('peajetron');
		$menu['menu'] = $this->menu->ensamblar($session['id_perfil']);
		$data['titulo'] = 'Usuario: '.$session['nombre'];
		$data['header'] = 'id_perfil, id_tipo_documento, id_ubicacion, documento, nombre, correo, telefono, direccion, activo, fecha_registro, fecha_modificacion';
		$this->load->view('front/head.php', $data);
		$this->load->view('front/header.php');
		$this->load->view('menu', $menu);
		$this->load->view('dhtmlxGrid', $data);
		$this->load->view('front/footer.php');
	}

	function data()
	{
		$connector = new GridConnector($this->db, 'phpCI');
		$connector->configure('usuario', 'id_usuario', 'id_perfil, id_tipo_documento, id_ubicacion, documento, nombre, correo, telefono, direccion, activo, fecha_registro, fecha_modificacion');
		$connector->event->attach($this);
		$connector->render();
	}
}
?>
