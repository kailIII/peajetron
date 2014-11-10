<?php 
include 'gestorCorreo.php';
include 'pqr.php';
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class GestorPQR extends CI_Controller {
	private $gestorCorreo ;
	function __construct()
	{
		parent::__construct();
		if($this->session->userdata('peajetron'))
		{
			$this->load->model('menu', '', TRUE);
			$this->load->model('Modelo_pqr', '', TRUE);
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
		$this->load->view('front/head.php', $data);
		$this->load->view('front/header.php');
		$this->load->view('menu', $menu);
		if ($session['id_usuario']='3'){
			$this->load->view('pqr/welcome_message');
			}else{
				$this->obtenerQuejaInv();
				}
		$this->load->view('pqrs');
		$this->load->view('front/footer.php');
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
	/**
	 * Controlador para cargar la queja por parte del usuario
	 * */
	public function obtenerQueja(){
		$this->load->library('form_validation');
		$this->form_validation->set_rules('radicado', 'Radicado', 'required|min_length[2]|max_length[1000]');
		$session = $this->session->userdata('peajetron');
		if($this->form_validation->run() === true){
			try{
				$queja = $this->Modelo_pqr->obtenerQueja($this->input->post('radicado'),$session['id_usuario']);
				$this->gestorCorreo=new GestorCorreo();
				$this->gestorCorreo->enviarPQR($queja);
				$datos = array('queja'=>$queja);
				
			}catch(Exception $e){
				$session = $this->session->userdata('peajetron');
				$menu['menu'] = $this->menu->ensamblar($session['id_perfil']);
				$data['titulo'] = 'Usuario: '.$session['nombre'];
				$this->load->view('front/head.php', $data);
				$this->load->view('front/header.php');
				$this->load->view('menu', $menu);
				$this->load->view('pqr/welcome_message');
				$this->load->view('front/footer.php');
				}
		}
		else{			
			
			}
			$session = $this->session->userdata('peajetron');
				$menu['menu'] = $this->menu->ensamblar($session['id_perfil']);
				$data['titulo'] = 'Usuario: '.$session['nombre'];
				$this->load->view('front/head.php', $data);
				$this->load->view('front/header.php');
				$this->load->view('menu', $menu);
				if(isset($datos)){
					$this->load->view('pqr/welcome_message',$datos);
				}else{
					$this->load->view('pqr/welcome_message');
					}
				$this->load->view('front/footer.php');
		}
		/**
		 * Controlador para responder la queja por parte del usuario invias
		 * 
		 * */
	public function responderPQR($radicado){
		$session = $this->session->userdata('peajetron');
		$this->load->library('form_validation');
		$this->form_validation->set_rules('mensajeRespuesta', 'Mensaje Respuesta', 'required|min_length[10]|max_length[1000]');
		
		if($this->form_validation->run() === true ){	 
			$datos['usuarioresponde']=$session['id_usuario'];
			$datos['fecharespuesta']=date("Y-m-d");
			$datos['tematerminado']='1';
			$datos['mensajerespuesta']=$this->input->post('mensajeRespuesta');
			if($this->Modelo_pqr->responderQuejaInv($datos,$radicado)>0){
				$queja = $this->Modelo_pqr->obtenerQueja($radicado,$session['id_usuario']);
				$this->gestorCorreo=new GestorCorreo();
				if($this->gestorCorreo->enviarPQR($queja)){
					$dato = array('valor'=>'Respuesta exitosa, se da el tema por terminado. Se envio el correo 
					al usuario con los datos de la Solicitud');
				}
				else{
							$dato = array('valor'=>'Respuesta exitosa, se da el tema por terminado. 
							Hubo un error al enviar el correo');
					}
			}else{
					$dato = array('valor'=>'No se ha podido responder la queja, error.');
				}
			$this->cargarEncabezado();
			$this->load->view('pqr/formvalidadoinvias',$dato);
			$this->cargarPie();
			
		}else{
			$this->consultarPQR($radicado);
			$info='El mensaje es requerido.';
			return $info;
			}
			
		}
		/**
		 * Envia un arreglo con los datos de los usuarios y departamentos encargados de las quejas.
		 * @param string descripcionDepartamento
		 * @return string usuario
		 * 
		 * */
	public function consultarRemision($radicado){
		$queja = $this->Modelo_pqr->obtenerUsuarioEncTodos();
		foreach($queja->result() as $row){
			$data[$row->identificador]= ucwords(strtolower($row->descripciondepartamento));    
        }
		$datos = array('queja'=>$data,'radicado'=>$radicado);
		$this->cargarEncabezado();
		$this->load->view('pqr/remiteinvias',$datos);
		$this->cargarPie();
		}	
		/**
		 * Controlador para eliminar la queja por parte del usuario
		 * 
		 * */
	
	public function eliminarQueja($pqr){
		
		}
		/**
		 * Controlador para remitir la queja a otro usuario invias o departamento
		 * */
	public function remitirQueja($radicado){
		$datos['usuarioencargado']=$this->input->post('encargado');
		$error = $this->Modelo_pqr->responderQuejaInv($datos,$radicado);
		$dato = array('valor'=>'Queja remitida correctamente');
		$this->cargarEncabezado();
		$this->load->view('pqr/formvalidadoinvias',$dato);
		$this->cargarPie();
		return $dato;
		}
	/**
	 * Controlador para registro de la queja por parte del usuario ciudadano
	 * 
	 * */
	public function registrarDatos(){
			try{
			$session = $this->session->userdata('peajetron');
			$this->load->library('form_validation');
			$this->form_validation->set_rules('mensaje', 'Mensaje', 'required|min_length[10]|max_length[1000]');
			$this->form_validation->set_rules('tipo', 'Tipo', 'required|min_length[1]');
			$this->gestorCorreo=new GestorCorreo();
			$usuario = $this->Modelo_pqr->obtenerUsuarioEnc('ingreso');
			if($this->form_validation->run() === true and strlen($usuario->identificador)>0){	
				$datos['identificador']=$this->obtenerRadicado($session['id_usuario']);
				$datos['usuarioingresa']=$session['id_usuario'];
				$datos['usuarioresponde']=$usuario->identificador;
				$datos['fechaingreso']=date("Y-m-d");
				$datos['fechalectura']='1900-01-01';
				$datos['fecharespuesta']='1900-01-01';
				$datos['tematerminado']='0';
				$datos['tiposolicitud']=$this->input->post('tipo');
				$datos['ciudadsolicitud']='bogota';
				$datos['mensajepeticion']=$this->input->post('mensaje');
				$datos['mensajerespuesta']='';
				$datos['usuarioencargado']=$usuario->identificador ;	
				$error = $this->Modelo_pqr->registrarDato($datos);
				if($error>0){
					$dato = array('valor'=>'Creación exitosa. Su número de radicado es: '.$datos['identificador']);
					$queja = $this->Modelo_pqr->obtenerQueja($datos['identificador'],$session['id_usuario']);
					$this->gestorCorreo->enviarPQR($queja);
					$this->cargarEncabezado();
					$this->load->view('pqr/formvalidado',$dato);
					$this->cargarPie();
				}else{
					$this->cargarEncabezado();
					$this->load->view('pqr/registro');
					$this->cargarPie();
					}
			}else{
					$this->cargarEncabezado();
					$this->load->view('pqr/registro');
					$this->cargarPie();
				}
			}
			catch(Exception $e){
				$this->cargarEncabezado();
					$this->load->view('pqr/registro');
					$this->cargarPie();
				}		
		}
	/**
	 * Función que proporciona el número de radicado por usuario
	 * @param string
	 * */
	private function obtenerRadicado($usuario){
		
		return str_pad($this->session->userdata('username').($this->Modelo_pqr->obtenerRadicado($usuario)+1),13, "123", STR_PAD_LEFT);
		}
	/**
	 * Controlador que proporciona la interfaz de edición de la queja por parte del usuario invias
	 * @param string
	 * */
	public function consultarPQR($radicado){
		$session = $this->session->userdata('peajetron');
		
		$queja = $this->Modelo_pqr->obtenerQueja($radicado,$session['id_usuario']);
		$datos['fechalectura']=date("Y-m-d");
		 $this->Modelo_pqr->responderQuejaInv($datos,$radicado);
		$datos = array('queja'=>$queja);
		$this->cargarEncabezado();
		$this->load->view('pqr/respondeinvias',$datos);
		$this->cargarPie();
		
		}
	/**
	 * Controlador que proporciona las quejas que el usuario invias tiene asiganadas.
	 * 
	 * */
	public function obtenerQuejaInv(){
		$session = $this->session->userdata('peajetron');
		$query = $valor1 = $this->Modelo_pqr->obtenerQuejaInv($session['id_usuario']);
		$vista = '';
		foreach ($query->result() as $row)
			{
						$vista = $vista . $row->identificador.'-'.$row->tiposolicitud.';';
						
			}
		$datos= array('vista'=>$vista);
		$this->cargarEncabezado();
		$this->load->view('pqr/consultainvias',$datos);
		$this->cargarPie();
		}
}

/* End of file welcome.php */
/* Location: ./application/controllers/gestorpqr.php */
