<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

session_start();
require_once('application/third_party/dhtmlx/sources/dhtmlxConnector/codebase/grid_connector.php');
require_once('application/third_party/dhtmlx/sources/dhtmlxConnector/codebase/db_phpci.php');
DataProcessor::$action_param = 'dhx_editor_status';

class Ubicacion extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		if($this->session->userdata('peajetron'))
		{
			$this->load->model('menu', '', TRUE);
			$this->load->model('ubicaciones', '', TRUE);
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
		$data['ubicacion'] = $this->ubicaciones->combo();

		$this->load->view('front/head.php', $data);
		$this->load->view('front/header.php');
		$this->load->view('menu', $menu);
		$this->load->view('ubicaciones', $data);
		$this->load->view('front/footer.php');
	}

	function datos()
	{
		try
		{
			$connector = new GridConnector($this->db, 'phpCI');
			$connector->configure('ubicacion', 'id_ubicacion', 'id_ubicacion_padre,ubicacion');
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
