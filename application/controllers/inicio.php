<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

session_start();
class Inicio extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		if($this->session->userdata('peajetron'))
		{
			$this->load->model('menu', '', TRUE);
		}
		else
		{
			redirect('login', 'refresh');
		}
	}

	function index()
	{
		$session = $this->session->userdata('peajetron');
		if($session['controlador'] != '')
			redirect($session['controlador'], 'refresh');
		$menu['menu'] = $this->menu->ensamblar($session['id_perfil']);
		$data['titulo'] = 'Usuario: '.$session['nombre'];
		$this->load->view('front/head.php', $data);
		$this->load->view('front/header.php');
		$this->load->view('menu', $menu);
		$this->load->view('inicio');
		$this->load->view('front/footer.php');
	}

	function salir()
	{
		$this->session->unset_userdata('peajetron');
		session_destroy();
		redirect('inicio', 'refresh');
	}
}
?>
