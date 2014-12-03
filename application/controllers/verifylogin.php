<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class VerifyLogin extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->model('usuarios', '', TRUE);
	}
 
	function index()
	{
		$this->form_validation->set_rules('usuario', 'Usuario', 'required|valid_email');
		$this->form_validation->set_rules('contrasena', 'Contraseña', 'trim|required|xss_clean|callback_check_database');

		if($this->form_validation->run() == false)
		{
			$data['titulo'] = 'Pago de Peajes';
			$this->load->view('front/head.php', $data);
			$this->load->view('front/header.php');
			$this->load->view('login.php');
			$this->load->view('front/footer.php');
		}
		else
		{
			redirect('inicio', 'refresh');
		}
	}

	function check_database($contrasena)
	{
		try
		{
			$usuario = $this->input->post('usuario');
			$result = json_decode($this->usuarios->login($usuario, $contrasena));

			if($result->status)
			{
				$sess_array = array('id_usuario' => $result->content[0]->id_usuario, 'id_perfil' => $result->content[0]->id_perfil, 'id_tipo_documento' => $result->content[0]->id_tipo_documento, 'id_ubicacion' => $result->content[0]->id_ubicacion, 'documento' => $result->content[0]->documento, 'nombre' => $result->content[0]->nombre, 'correo' => $result->content[0]->correo, 'telefono' => $result->content[0]->telefono, 'direccion' => $result->content[0]->direccion, 'activo' => $result->content[0]->activo, 'controlador' => $result->content[0]->controlador);
				$this->session->set_userdata('peajetron', $sess_array);
				return true;
			}
			else
			{
				$this->form_validation->set_message('check_database', 'Nombre de usuario o contraseña incorrecta');
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
?>
