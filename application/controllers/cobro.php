<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

session_start();
class Cobro extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		if($this->session->userdata('peajetron'))
		{
			$this->load->model('menu', '', TRUE);
			$this->load->model('cobros', '', TRUE);
			$this->load->model('peajes', '', TRUE);
			$this->load->model('vehiculos', '', TRUE);
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
		$select['peaje'] = json_decode($this->peajes->listar(), true);
		$data['titulo'] = 'Usuario: '.$session['nombre'];
		$this->load->view('front/head.php', $data);
		$this->load->view('front/header.php');
		$this->load->view('menu', $menu);
		$this->load->view('cobros', $select);
		$this->load->view('front/footer.php');
	}

	function capturar()
	{
		$session = $this->session->userdata('peajetron');
		$session['id_peaje'] = $this->input->post('id_peaje');
		$session['mensaje'] = null;
		if($session['id_peaje'] == "")
			redirect('cobro', 'refresh');
		$this->session->set_userdata('peajetron', $session);
		$menu['menu'] = $this->menu->ensamblar($session['id_perfil']);
		$data['titulo'] = 'Usuario: '.$session['nombre'];
		$this->load->view('front/head.php', $data);
		$this->load->view('front/header.php');
		$this->load->view('menu', $menu);
		$this->load->view('cruce', $session);
		$this->load->view('front/footer.php');
	}

	function registrar()
	{
		$result = null;
    $this->form_validation->set_rules('vcard', 'Vcard', 'trim|required|xss_clean|callback_check_vcard');
    $this->form_validation->set_rules('id_usuario', 'Usuario', 'required|xss_clean|integer');
    $this->form_validation->set_rules('id_peaje', 'Peaje', 'required|xss_clean|integer');
		if($this->form_validation->run() == true)
			$result = $this->cobros->insertar($this->input->post());

  	$session = $this->session->userdata('peajetron');
		$session['mensaje'] = $result;
		$menu['menu'] = $this->menu->ensamblar($session['id_perfil']);
		$data['titulo'] = 'Usuario: '.$session['nombre'];
		$this->load->view('front/head.php', $data);
		$this->load->view('front/header.php');
		$this->load->view('menu', $menu);
		$this->load->view('cruce', $session);
		$this->load->view('front/footer.php');
	}

	function check_vcard($vcard)
	{
		$resultado = true;
		$lines = preg_split('/\r\n|[\r\n]/', $vcard);
		if($lines[0] != 'BEGIN:VCARD')
			$resultado = false;
		elseif($lines[1] != 'VERSION:4.0')
			$resultado = false;
		elseif(strlen($lines[2]) != 8 || substr($lines[2], 0, 2) != 'N:')
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
}
?>
