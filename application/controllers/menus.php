<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

session_start();
require_once('application/third_party/dhtmlx/sources/dhtmlxConnector/codebase/grid_connector.php');
require_once('application/third_party/dhtmlx/sources/dhtmlxConnector/codebase/db_phpci.php');
DataProcessor::$action_param = 'dhx_editor_status';

class Menus extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		if($this->session->userdata('peajetron'))
		{
			$this->load->model('menu', '', TRUE);
			$this->load->model('perfil_menu', '', TRUE);
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
		$data['menu'] = $this->menu->combo();

		$this->load->view('front/head.php', $data);
		$this->load->view('front/header.php');
		$this->load->view('menu', $menu);
		$this->load->view('menus', $data);
		$this->load->view('front/footer.php');
	}

	function datos()
	{
		try
		{
			$connector = new GridConnector($this->db, 'phpCI');
			$connector->configure('menu', 'id_menu', 'id_menu_padre,menu,url,icono,orden');
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

	function permitir($menu)
	{
		try
		{
			$menu   = $this->menu->buscar($menu);
			$perfil = $this->perfil_menu->buscar($menu);
			if($menu && $perfil)
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
		$action->set_value('id_menu_padre', Null);
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
		$c = new Menus;
		$result = $c->permitir($action->get_value('id_menu'));
	
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
