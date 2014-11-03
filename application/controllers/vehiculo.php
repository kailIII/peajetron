<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

session_start();
require_once('application/third_party/dhtmlx/sources/dhtmlxConnector/codebase/grid_connector.php');
require_once('application/third_party/dhtmlx/sources/dhtmlxConnector/codebase/db_phpci.php');
DataProcessor::$action_param = 'dhx_editor_status';

class Vehiculo extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		if($this->session->userdata('peajetron'))
		{
	    $this->load->model('menu', '', TRUE);
	    $this->load->model('vehiculos', '', TRUE);
			$this->load->model('usuarios', '', TRUE);
	    $this->load->model('vehiculo_estado', '', TRUE);
			$this->load->model('categorias', '', TRUE);
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
		$this->load->view('vehiculos');
		$this->load->view('front/footer.php');
	}

	function crear()
	{
		$session = $this->session->userdata('peajetron');
		$menu['menu'] = $this->menu->ensamblar($session['id_perfil']);
		$data['titulo'] = 'Usuario: '.$session['nombre'];

		$usuario = json_decode($this->usuarios->listar(), true);
		foreach($usuario as $value)
			$select['usuario'][$value['id_usuario']] = $value['nombre'];
		$categoria = json_decode($this->categorias->listar(), true);
		foreach($categoria as $value)
			$select['categoria'][$value['id_categoria']] = $value['categoria'];

		$this->load->view('front/head.php', $data);
		$this->load->view('front/header.php');
		$this->load->view('menu', $menu);
		$this->load->view('crear_vehiculos', $select);
		$this->load->view('front/footer.php');
	}

	function listar()
	{
		$session = $this->session->userdata('peajetron');
		$menu['menu'] = $this->menu->ensamblar($session['id_perfil']);
		$data['titulo'] = 'Usuario: '.$session['nombre'];
		$data['usuarios'] = $this->usuarios->combo();
		$data['estados'] = $this->vehiculo_estado->combo();
		$data['categorias'] = $this->categorias->combo();

		$this->load->view('front/head.php', $data);
		$this->load->view('front/header.php');
		$this->load->view('menu', $menu);
		$this->load->view('administrar_vehiculos', $data);
		$this->load->view('front/footer.php');
	}

	function registrar()
	{
		$session = $this->session->userdata('peajetron');

		$this->form_validation->set_rules('placa', 'Placa', 'trim|required|xss_clean|callback_check_placa|is_unique[vehiculo.placa]');
		$this->form_validation->set_rules('marca', 'Marca', 'trim|xss_clean');
		$this->form_validation->set_rules('color', 'Color', 'trim|xss_clean');
		$this->form_validation->set_rules('modelo', 'Modelo', 'trim|xss_clean|integer');

		if($this->form_validation->run() == true)
		{
			$result = $this->vehiculos->insertar($this->input->post());
			if($result)
			{
				$mensaje = "<h1>Bienvenido ".$this->input->post('placa')."</h1><br />Usuario: Pepe";
				$this->email->from('admin@peajetron.com', 'Peajetron');
				$this->email->to("temp2010@msn.com");
				$this->email->subject('Registro Vehiculo');
				$this->email->message($mensaje);

				$this->email->send();
				redirect('vehiculo/crear', 'refresh');
			}
		}
		$menu['menu'] = $this->menu->ensamblar($session['id_perfil']);
		$data['titulo'] = 'Usuario: '.$session['nombre'];

		$usuario = json_decode($this->usuarios->listar(), true);
		foreach($usuario as $value)
			$select['usuario'][$value['id_usuario']] = $value['nombre'];
		$categoria = json_decode($this->categorias->listar(), true);
		foreach($categoria as $value)
			$select['categoria'][$value['id_categoria']] = $value['categoria'];

		$this->load->view('front/head.php', $data);
		$this->load->view('front/header.php');
		$this->load->view('menu', $menu);
		$this->load->view('crear_vehiculos', $select);
		$this->load->view('front/footer.php');
	}

	function check_placa($placa)
	{
		if(!preg_match("/[A-Z]{3}[0-9]{3}/", $placa))
		{
			$this->form_validation->set_message('check_placa', 'Formato de placa incorrecto');
			return false;
		}
		return true;
	}

	function datos()
	{
		$connector = new GridConnector($this->db, 'phpCI');
		$connector->configure('vehiculo', 'id_vehiculo', 'id_usuario, id_estado_vehiculo, id_categoria, placa, marca, color, modelo, fecha_registro, fecha_modificacion');
		$connector->event->attach($this);
		$connector->render();
	}
}
?>
