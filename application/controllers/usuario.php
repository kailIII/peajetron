<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

session_start();
require_once('application/third_party/dhtmlx/sources/dhtmlxConnector/codebase/grid_connector.php');
require_once('application/third_party/dhtmlx/sources/dhtmlxConnector/codebase/db_phpci.php');
DataProcessor::$action_param = 'dhx_editor_status';

class Usuario extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		if($this->session->userdata('peajetron'))
		{
			$this->load->model('menu', '', TRUE);
			$this->load->model('usuarios', '', TRUE);
			$this->load->model('perfiles', '', TRUE);
			$this->load->model('documentos', '', TRUE);
			$this->load->model('ubicaciones', '', TRUE);
		}
		else
		{
			redirect('login', 'refresh');
		}
	}

	function crear()
	{
		$session = $this->session->userdata('peajetron');
		$menu['menu'] = $this->menu->ensamblar($session['id_perfil']);
		$data['titulo'] = 'Usuario: '.$session['nombre'];

		$perfil = json_decode($this->perfiles->listar(), true);
		foreach($perfil as $value)
			$select['perfil'][$value['id_perfil']] = $value['perfil'];
		$documento = json_decode($this->documentos->listar(), true);
		foreach($documento as $value)
			$select['documento'][$value['id_tipo_documento']] = $value['tipo_documento'];
		$ubicacion = json_decode($this->ubicaciones->listar(), true);
		foreach($ubicacion as $value)
			$select['ubicacion'][$value['id_ubicacion']] = $value['ubicacion'];

		$this->load->view('front/head.php', $data);
		$this->load->view('front/header.php');
		$this->load->view('menu', $menu);
		$this->load->view('crear_usuarios', $select);
		$this->load->view('front/footer.php');
	}

	function modificar()
	{
		$session = $this->session->userdata('peajetron');
		$menu['menu'] = $this->menu->ensamblar($session['id_perfil']);
		$data['titulo'] = 'Usuario: '.$session['nombre'];

		$documento = json_decode($this->documentos->listar(), true);
		foreach($documento as $value)
			$session['sdocumento'][$value['id_tipo_documento']] = $value['tipo_documento'];
		$ubicacion = json_decode($this->ubicaciones->listar(), true);
		foreach($ubicacion as $value)
			$session['ubicacion'][$value['id_ubicacion']] = $value['ubicacion'];

		$this->load->view('front/head.php', $data);
		$this->load->view('front/header.php');
		$this->load->view('menu', $menu);
		$this->load->view('modificar_usuarios', $session);
		$this->load->view('front/footer.php');
	}

	function listar()
	{
		$session = $this->session->userdata('peajetron');
		$menu['menu'] = $this->menu->ensamblar($session['id_perfil']);
		$data['titulo'] = 'Usuario: '.$session['nombre'];
		$data['perfiles'] = $this->perfiles->combo();
		$data['documentos'] = $this->documentos->combo();
		$data['ubicaciones'] = $this->ubicaciones->combo();

		$this->load->view('front/head.php', $data);
		$this->load->view('front/header.php');
		$this->load->view('menu', $menu);
		$this->load->view('administrar_usuarios', $data);
		$this->load->view('front/footer.php');
	}

	function registrar()
	{
		$session = $this->session->userdata('peajetron');

		$this->form_validation->set_rules('documento', 'Documento', 'trim|required|xss_clean|integer');
		$this->form_validation->set_rules('nombre', 'Nombre', 'trim|required|xss_clean');
		$this->form_validation->set_rules('correo', 'Correo', 'trim|required|xss_clean|valid_email|is_unique[usuario.correo]');
		$this->form_validation->set_rules('telefono', 'Teléfono', 'trim|required|xss_clean|integer');
		$this->form_validation->set_rules('direccion', 'Dirección', 'trim|required|xss_clean');

		if($this->form_validation->run() == true)
		{
			$contrasena = $this->usuarios->contrasena();
			$correo = $this->input->post('correo');
			$result = $this->usuarios->insertar($this->input->post(), $contrasena);
			if($result)
			{
				$mensaje = "<h1>Bienvenido ".$this->input->post('nombre')."</h1><br />Usuario: ".$this->input->post('correo')."<br />Contraseña: ".$contrasena;
				$this->email->from('admin@peajetron.com', 'Peajetron');
				$this->email->to($this->input->post('correo'));
				$this->email->subject('Registro Usuario');
				$this->email->message($mensaje);

				$this->email->send();
				redirect('usuario/crear', 'refresh');
			}
		}
		$menu['menu'] = $this->menu->ensamblar($session['id_perfil']);
		$data['titulo'] = 'Usuario: '.$session['nombre'];
		$perfil = json_decode($this->perfiles->listar(), true);
		foreach($perfil as $value)
			$select['perfil'][$value['id_perfil']] = $value['perfil'];
		$documento = json_decode($this->documentos->listar(), true);
		foreach($documento as $value)
			$select['documento'][$value['id_tipo_documento']] = $value['tipo_documento'];
		$ubicacion = json_decode($this->ubicaciones->listar(), true);
		foreach($ubicacion as $value)
			$select['ubicacion'][$value['id_ubicacion']] = $value['ubicacion'];
		$this->load->view('front/head.php', $data);
		$this->load->view('front/header.php');
		$this->load->view('menu', $menu);
		$this->load->view('crear_usuarios', $select);
		$this->load->view('front/footer.php');
	}

	function actualizar()
	{
		$session = $this->session->userdata('peajetron');
		$correo = ($session['correo'] != $this->input->post('correo')) ? '|is_unique[usuario.correo]' : '';
		$this->form_validation->set_rules('documento', 'Documento', 'trim|required|xss_clean|integer');
		$this->form_validation->set_rules('nombre', 'Nombre', 'trim|required|xss_clean');
		$this->form_validation->set_rules('correo', 'Correo', 'trim|required|xss_clean|valid_email'.$correo);
		$this->form_validation->set_rules('telefono', 'Teléfono', 'trim|required|xss_clean|integer');
		$this->form_validation->set_rules('direccion', 'Dirección', 'trim|required|xss_clean');
		$this->form_validation->set_rules('contrasena', 'Contraseña', 'trim|matches[contrasena2]|md5');

		if($this->form_validation->run() == true) {
			$result = $this->usuarios->actualizar($session['id_usuario'], $this->input->post());
			$sess_array = array('id_usuario' => $session['id_usuario'], 'id_perfil' => $session['id_perfil'], 'id_tipo_documento' => $this->input->post('id_tipo_documento'), 'id_ubicacion' => $this->input->post('id_ubicacion'), 'documento' => $this->input->post('documento'), 'nombre' => $this->input->post('nombre'), 'correo' => $this->input->post('correo'), 'telefono' => $this->input->post('telefono'), 'direccion' => $this->input->post('direccion'), 'activo' => $session['activo'], 'controlador' => $session['controlador']);
			$this->session->set_userdata('peajetron', $sess_array);
			$session = $this->session->userdata('peajetron');
		}
		$menu['menu'] = $this->menu->ensamblar($session['id_perfil']);
		$data['titulo'] = 'Usuario: '.$session['nombre'];

		$documento = json_decode($this->documentos->listar(), true);
		foreach($documento as $value)
			$session['sdocumento'][$value['id_tipo_documento']] = $value['tipo_documento'];
		$ubicacion = json_decode($this->ubicaciones->listar(), true);
		foreach($ubicacion as $value)
			$session['ubicacion'][$value['id_ubicacion']] = $value['ubicacion'];

		$this->load->view('front/head.php', $data);
		$this->load->view('front/header.php');
		$this->load->view('menu', $menu);
		$this->load->view('modificar_usuarios', $session);
		$this->load->view('front/footer.php');
	}

	function datos()
	{
		try
		{
			$connector = new GridConnector($this->db, 'phpCI');
			$connector->configure('usuario', 'id_usuario', 'id_perfil, id_tipo_documento, id_ubicacion, documento, nombre, correo, telefono, direccion, activo, fecha_registro, fecha_modificacion');
			$connector->event->attach($this);
			$connector->render();
		}
		catch(Exception $e)
		{		
			log_message('error', $e->getMessage());
			return false;
		}
	}
}
?>
