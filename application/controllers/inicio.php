<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

session_start();
class Inicio extends CI_Controller {
	function __construct()
	{
		parent::__construct();
	}

	function index()
	{
		if($this->session->userdata('peajetron'))
		{
			$session = $this->session->userdata('peajetron');
			$data['meta'] = array(array('name' => 'Content-type', 'content' => 'text/html; charset=utf-8', 'type' => 'equiv'),array('name' => 'language', 'content' => 'es'));
			$data['logo_image'] = array('src' => 'images/logo.png','alt' => 'logo', 'width' => '90', 'height' => '100');
			$data['banner_image'] = array('src' => 'images/banner.png','alt' => 'banner', 'width' => '616', 'height' => '100');
			$data['titulo'] = 'Usuario: '.$session['nombre'];
			$this->load->view('front/head.php', $data);
			$this->load->view('front/header.php', $data);
			$this->load->view('inicio', $data);
			$this->load->view('front/footer.php');
		}
		else
		{
			redirect('login', 'refresh');
		}
	}
			  
	function salir()
	{
		$this->session->unset_userdata('peajetron');
		session_destroy();
		redirect('inicio', 'refresh');
	}
}
?>
