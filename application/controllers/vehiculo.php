<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

session_start();
class Vehiculo extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		if($this->session->userdata('peajetron'))
		{
	    $this->load->model('menu', '', TRUE);
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
		$this->load->view('front/head.php', $data);
		$this->load->view('front/header.php');
		$this->load->view('menu', $menu);
		$this->load->view('vehiculos');
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
			$this->load->view('vehiculos');
			$this->load->view('front/footer.php');
	}
}
?>
