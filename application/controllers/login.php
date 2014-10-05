<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {
	function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$data['titulo'] = 'Pago de Peajes';
		$this->load->view('front/head.php', $data);
		$this->load->view('front/header.php');
		$this->load->view('login.php');
		$this->load->view('front/footer.php');
	}
}
