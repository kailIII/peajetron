<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->model('usuarios', '', TRUE);
	}

	function index()
	{
		$data['titulo'] = 'Pago de Peajes';
		$this->load->view('front/head.php', $data);
		$this->load->view('front/header.php');
		$this->load->view('login.php');
		$this->load->view('front/footer.php');
	}

	function olvido()
	{
		$data['titulo'] = 'Pago de Peajes';
		$this->load->view('front/head.php', $data);
		$this->load->view('front/header.php');
		$this->load->view('olvido.php');
		$this->load->view('front/footer.php');
	}

	function recuperar()
	{
		$this->form_validation->set_rules('correo', 'Usuario', 'required|valid_email|callback_check_database');
		if($this->form_validation->run() == true)
		{
			$contrasena = $this->usuarios->contrasena();
			$result = $this->usuarios->cambiar($this->input->post('correo'), $contrasena);
			if($result)
			{
				$mensaje = "Usuario: ".$this->input->post('correo')."<br />Contraseña: ".$contrasena;
				$this->email->from('admin@peajetron.com', 'Peajetron');
				$this->email->to($this->input->post('correo'));
				$this->email->subject('Registro Usuario');
				$this->email->message($mensaje);

				$this->email->send();
			}
		}
		$data['titulo'] = 'Pago de Peajes';
		$this->load->view('front/head.php', $data);
		$this->load->view('front/header.php');
		$this->load->view('olvido.php');
		$this->load->view('front/footer.php');
	}

	function check_database($correo)
	{
		try
		{
			$result = json_decode($this->usuarios->correo($correo));
			if($result->status)
			{
				return true;
			}
			else
			{
				$this->form_validation->set_message('check_database', 'Correo incorrecto');
				return false;
			}
		}
		catch(Exception $e)
		{		
			log_message('error', $e->getMessage());
			return false;
		}
	}
}
