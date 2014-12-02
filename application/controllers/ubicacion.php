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
			$this->load->model('usuarios', '', TRUE);
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
			$connector->event->attach('beforeInsert', 'insertar');
			$connector->event->attach('beforeDelete', 'borrar');
			$connector->render();
		}
		catch(Exception $e)
		{		
			log_message('error', $e->getMessage());
			return false;
		}
	}

	function permitir($ubicacion)
	{
		try
		{
			$ubica = $this->ubicaciones->buscar($ubicacion);
			$usuario = $this->usuarios->buscarUbicacion($ubicacion);
			if($ubica && $usuario)
			{
				return true;
			}
			else
			{
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

function insertar($action)
{
	try
	{
		$action->set_value('id_ubicacion_padre', Null);
	}
	catch(Exception $e)
	{		
		log_message('error', $e->getMessage());
		return false;
	}
}

function borrar($action)
{
	try
	{
		$c = new Ubicacion;
		$result = $c->permitir($action->get_value('id_ubicacion'));
	
		if(!$result)
			$action->invalid();
	}
	catch(Exception $e)
	{		
		log_message('error', $e->getMessage());
		return false;
	}
}
?>
