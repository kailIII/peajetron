<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

session_start();
require_once('application/third_party/dhtmlx/sources/dhtmlxConnector/codebase/grid_connector.php');
require_once('application/third_party/dhtmlx/sources/dhtmlxConnector/codebase/db_phpci.php');
DataProcessor::$action_param = 'dhx_editor_status';

class Cobro extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		if($this->session->userdata('peajetron'))
		{
			$this->load->model('menu', '', TRUE);
			$this->load->model('cobros', '', TRUE);
			$this->load->model('peajes', '', TRUE);
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
		$peajes = json_decode($this->peajes->listar(), true);
		foreach($peajes as $value)
			$select['peaje'][$value['id_peaje']] = $value['peaje'];
		$data['titulo'] = 'Usuario: '.$session['nombre'];
		$this->load->view('front/head.php', $data);
		$this->load->view('front/header.php');
		$this->load->view('menu', $menu);
		$this->load->view('cobros', $select);
		$this->load->view('front/footer.php');
	}

	function listar()
	{
		$session = $this->session->userdata('peajetron');
		$menu['menu'] = $this->menu->ensamblar($session['id_perfil']);
		$data['titulo'] = 'Usuario: '.$session['nombre'];
		$this->load->view('front/head.php', $data);
		$this->load->view('front/header.php');
		$this->load->view('menu', $menu);
		$this->load->view('administrar_cobros', $data);
		$this->load->view('front/footer.php');
	}

	function capturar($id_peaje)
	{
		$session = $this->session->userdata('peajetron');
		if($id_peaje == 'true')
			$session['id_peaje'] = $this->input->post('id_peaje');
		$this->session->set_userdata('peajetron', $session);
		if($session['id_peaje'] == "")
			redirect('cobro', 'refresh');
		$session['mensaje'] = null;
		$menu['menu'] = $this->menu->ensamblar($session['id_perfil']);
		$data['titulo'] = 'Usuario: '.$session['nombre'];
		$this->load->view('front/head.php', $data);
		$this->load->view('front/header.php');
		$this->load->view('menu', $menu);
		$this->load->view('cruce', $session);
		$this->load->view('front/footer.php');
	}

	function registrarQR()
	{
		$result = null;
    $this->form_validation->set_rules('vcard', 'Vcard', 'required|xss_clean|callback_check_vcard');
    $this->form_validation->set_rules('id_usuario', 'Usuario', 'required|xss_clean|integer');
    $this->form_validation->set_rules('id_peaje', 'Peaje', 'required|xss_clean|integer');
		if($this->form_validation->run() == true)
			$result = $this->cobros->insertarQR($this->input->post());

  	$session = $this->session->userdata('peajetron');
		$session['mensaje'] = (is_null($result)) ? '' : (($result == 0) ? "Cruce registrado correctamente" : ("Error: ".$result));
		$menu['menu'] = $this->menu->ensamblar($session['id_perfil']);
		$data['titulo'] = 'Usuario: '.$session['nombre'];
		$this->load->view('front/head.php', $data);
		$this->load->view('front/header.php');
		$this->load->view('menu', $menu);
		$this->load->view('cruce', $session);
		$this->load->view('front/footer.php');
	}

	function registrarPlaca()
	{
		$result = null;
    $this->form_validation->set_rules('placa', 'Placa', 'required|xss_clean|callback_check_placa');
    $this->form_validation->set_rules('id_usuario', 'Usuario', 'required|xss_clean|integer');
    $this->form_validation->set_rules('id_peaje', 'Peaje', 'required|xss_clean|integer');
		$validation = $this->form_validation->run();
		if($validation == true)
			$result = $this->cobros->insertarPlaca($this->input->post());

  	$session = $this->session->userdata('peajetron');
		$session['mensaje'] = ($result) ? "Cruce registrado correctamente" : "Error: 002";
		$menu['menu'] = $this->menu->ensamblar($session['id_perfil']);
		$data['titulo'] = 'Usuario: '.$session['nombre'];
		$this->load->view('front/head.php', $data);
		$this->load->view('front/header.php');
		$this->load->view('menu', $menu);
		if($validation == true)
			$this->load->view('cruce', $session);
		else
			$this->load->view('placa', $session);
		$this->load->view('front/footer.php');
	}

	function placa()
	{
		$session = $this->session->userdata('peajetron');
		$menu['menu'] = $this->menu->ensamblar($session['id_perfil']);
		$data['titulo'] = 'Usuario: '.$session['nombre'];
		$this->load->view('front/head.php', $data);
		$this->load->view('front/header.php');
		$this->load->view('menu', $menu);
		$this->load->view('placa', $session);
		$this->load->view('front/footer.php');
	}

	function datos()
	{
		try
		{
			$connector = new GridConnector($this->db, 'phpCI');
			$connector->render_sql("SELECT id_cobro, placa, pr.nombre AS propietario, re.nombre AS registra, peaje, valor, cobro.fecha_registro, fecha_pago
                              FROM cobro
                              LEFT JOIN vehiculo ON vehiculo.id_vehiculo = cobro.id_vehiculo
                              LEFT JOIN usuario pr ON pr.id_usuario = cobro.id_usuario_propietario
                              LEFT JOIN usuario re ON re.id_usuario = cobro.id_usuario_registra
                              LEFT JOIN peaje ON peaje.id_peaje = cobro.id_peaje", "id_cobro", "placa, propietario, registra, peaje, valor, fecha_registro, fecha_pago
                             ");
		}
		catch(Exception $e)
		{
			log_message('error', $e->getMessage());
			return false;
		}
	}

	function check_vcard($vcard)
	{
		$resultado = true;
		$lines = preg_split('/\r\n|[\r\n]/', $vcard);
		if($lines[0] != 'BEGIN:VCARD')
			$resultado = false;
		elseif($lines[1] != 'VERSION:4.0')
			$resultado = false;
		elseif(strlen($lines[2]) != 8 || substr($lines[2], 0, 2) != 'N:' || !preg_match("/[A-Z]{3}[0-9]{3}/", substr($lines[2], 2, 6)))
			$resultado = false;
		elseif(strlen($lines[3]) != 69)
			$resultado = false;
		elseif(strlen($lines[4]) != 20 || substr($lines[4], 0, 4) != 'REV:')
			$resultado = false;
		elseif($lines[5] != 'END:VCARD')
			$resultado = false;
		if(!$resultado)
			$this->form_validation->set_message('check_vcard', 'Formato de vcard incorrecto');
		return $resultado;
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
}
?>
