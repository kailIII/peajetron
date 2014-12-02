<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

session_start();
class Permisos extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		if($this->session->userdata('peajetron'))
		{
			$this->load->model('menu', '', TRUE);
			$this->load->model('ubicaciones', '', TRUE);
			$this->load->model('perfiles', '', TRUE);
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
		$data['Widths'] = $data['ColTypes'] = $data['head'] = '';
		$head = json_decode($this->menu->listar(), true);
		$columnas = 0;
		if($head['status'])
			foreach($head['content'] as $value)
			{
				$data['head'] .= $value.',';
				$data['ColTypes'] .= 'ch,';
				$data['Widths'] .= '100,';
				$columnas++;
			}
		$data['columnas'] = $columnas;

		$this->load->view('front/head.php', $data);
		$this->load->view('front/header.php');
		$this->load->view('menu', $menu);
		$this->load->view('permisos', $data);
		$this->load->view('front/footer.php');
	}

	function datos()
	{
		echo $this->perfiles->grid($_GET['columnas']);
	}

	function guardar()
	{
	}
}
?>
