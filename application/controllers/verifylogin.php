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
    $this->form_validation->set_rules('contrasena', 'Contraseña', 'trim|required|xss_clean|md5|callback_check_database');

    if($this->form_validation->run() == false)
    {
			$this->load->view('login');
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
			$result = $this->usuarios->login($usuario, $contrasena);

			if($result)
			{
				$sess_array = array();
				foreach($result as $row)
				{
					$sess_array = array('id_usuario' => $row->id_usuario, 'id_perfil' => $row->id_perfil, 'nombre' => $row->nombre, 'correo' => $row->correo, 'activo' => $row->activo, 'controlador' => $row->controlador);
					$this->session->set_userdata('peajetron', $sess_array);
				}
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
