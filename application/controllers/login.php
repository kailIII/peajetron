<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {
	function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$data['logo_image'] = array('src' => 'images/logo.png','alt' => 'logo', 'width' => '90', 'height' => '100');
		$data['banner_image'] = array('src' => 'images/banner.png','alt' => 'banner', 'width' => '616', 'height' => '100');
		$data['titulo'] = 'Pago de Peajes';
		$this->load->view('front/head.php', $data);
		$this->load->view('front/header.php', $data);
		$this->load->view('login.php');
		$this->load->view('front/footer.php');
	}
}
