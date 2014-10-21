<?php
/*
 * Clase se que se encarga de controlaro los eventos que se generar en la
 * vista  para actualizar los datos de un usuario registrado.
 * */
class ActualizarDatos extends  CI_Controller{
	/*
	 * Constructor de la clase.
	 */
	public function __construct(){
		parent::__construct();
		$this->load->model('usuarios');
	}
	/**
	 * Método que se encarga de inicializar la  información necesaria 
	 * para ser enviada a la vista
	 */
	public function index()
	{
		$idUsuario = $this->idUsuario();
		$user = $this->usuarios->getUsuario( $idUsuario );
		if( $user !=FALSE ){//1
			$data = array(
				'status'     =>TRUE,
				'documento'  =>$user->documento,
				'nombre'     => $user->nombre,
				'correo'     => $user->correo,
				'contrasena' => $user->contrasena,
				'telefono'   => $user->telefono,
				'direccion'  => $user->direccion,
				'attributesForm' => array('id' => 'from_actualizar'),
			);//2
		}
		else{
			$data = array(
				'status'  => FALSE,
				'message' => 'El usuario no existe en el sistema'
			)://3
		}
		$this->load->view( 'consultasWeb/templateHeaderView'); 	
		$this->load->view( 'consultasWeb/templateMenuView');
		$this->load->view( 'consultasWeb/actualizarDatos/mostrarDatosView' , $data );//4
	}
	/**
	 * Función que se encarga de tomar los datos modificados por el usuario
	 * y guardarlos en la base de datos.
	*/
	public function actualizar()
	{
		$telefono =  $this->validateField( $this->input->post('telefono') );
		$correo   = $this->validateField( $this->input->post('correo') );//1
		if( $telefono!= '' && $correo != '' ){ //2, //3
			$idUsuario = $this->getIdUser();
			$result = $this->usuarios->actualizarDatos( $idUsuario , $correo, $telefono );
			$user = $this->usuarios->getUsuario( $idUsuario );
			$data = array(
				'documento'  =>$user->documento,
				'nombre'     => $user->nombre,
				'correo'     => $user->correo,
				'contrasena' => $user->contrasena,
				'telefono'   => $user->telefono,
				'direccion'  => $user->direccion,
				'status' 	 => $result,
			);	//4 
		}
		$this->load->view( 'consultasWeb/templateHeaderView'); 
		$this->load->view( 'consultasWeb/templateMenuView');
		$this->load->view( 'consultasWeb/actualizarDatos/actualizarView', $data );//5
	}

	private function validateField($data) {
	  $data = trim($data);
	  $data = stripslashes($data);
	  $data = htmlspecialchars($data);//1
	  return $data;//2
	}
	/**
	 * Función que se encarga de obtener el identificador del usuario  sesión en el sistema.
	 *
	 * @return Identificador del usuario.
	*/
	protected function getIdUser()
	{
		$this->session = $this->session->userdata('peajetron');
		$idUsuario = $this->session['id_usuario'];//1
		return $idUsuario;//2
	}
}