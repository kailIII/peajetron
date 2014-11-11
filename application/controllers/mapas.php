<?php

error_reporting(E_ALL ^ E_NOTICE);

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Mapas extends CI_Controller {
	
	function __construct()
	{
		parent::__construct();
		if($this->session->userdata('peajetron'))
		{
			$this->load->model('menu', '', TRUE);
			$this->load->model('historialVehiculos', '', TRUE);
		}
		else
		{
			redirect('login', 'refresh');
		}
	}

    /**
     * Index Page para este controlador.
     *
     * Mapa para el seguimiento de url
     * 		http://example.com/index.php/mapas
     * 	- o -  
     * 		http://example.com/index.php/mapas/index
     *
     * @see http://codeigniter.com/user_guide/general/urls.html
     */
    public function index() {
        $this->load->helper('form');
        $this->load->model('historialVehiculos');
        $this->load->library('googlemaps');

        //Da la configuracion inicial del mapa 
        $config = array();
        $config['center'] = 'puerto lopez, colombia';
        $config['zoom'] = 'auto';
        $this->googlemaps->initialize($config);

        $fechaInicio = $this->input->post('fechaInicio');
        $historialVehiculo = null;
        if ($fechaInicio != NULL) {
            $fechaFin = $this->input->post('fechaFin');
            $placa = $this->input->post('placa');
            $historialVehiculo = 
                    $this->historialVehiculos->obtenerHistorialByRangoFechaAndPlaca($fechaInicio, 
                                                                                          $fechaFin, 
                                                                                          $placa);
            if ($historialVehiculo != '61006' && $historialVehiculo != '61002') {
                foreach ($historialVehiculo as $registro) {
                    $marker = array();
                    $marker['position'] = $registro['latitud'] . ',' . $registro['longitud'];
                    $this->googlemaps->add_marker($marker);
                }
            }
        }

        $data = array();
        $data['historialVehiculo'] = $historialVehiculo;
        $data['map'] = $this->googlemaps->create_map();
		$this->cargarEncabezado();
        $this->load->view('mapas', $data);
        $this->cargarPie();
    }
    
    private function cargarEncabezado(){
		$session = $this->session->userdata('peajetron');
		$menu['menu'] = $this->menu->ensamblar($session['id_perfil']);
		$data['titulo'] = 'Usuario: '.$session['nombre'];
		$this->load->view('front/head.php', $data);
		$this->load->view('front/header.php');
		$this->load->view('menu', $menu);
	}
		
	private function cargarPie(){
		$this->load->view('front/footer.php');
	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
