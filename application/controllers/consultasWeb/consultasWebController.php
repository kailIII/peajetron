<?php
/**
  * Clase que se encarga de proveer de las funcionalidades básicas para el
	* módulo de consultas web.
	*
	* @author: Fabian Danilo Caicedo.
	* @author: Cristian Camilo Chaparro A.
 */
Class ConsultasWebController extends   MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('usuarios');
		$this->load->model('menu');
	}

	public function index()
	{

	}
	/**
	 * Función que se encarga de inicializar la vista para
	 * cargar en la vista la lista de placas del vehículo.
	*/
	public function inicializar( $pathView=null )
	{
			if( $pathView != '' )
			{
				  $listaAutos = $this->getListaAutos();
					if( empty( $listaAutos ) )
					{ //1
						$data = array(
							'status' => FALSE,
						); //2
					}
					else
					{  //3
						$data = array(
								'listaAutos' => $listaAutos,
								'status' => TRUE,
						);
					}
				

					$this->load->view( 'consultasWeb/templateHeaderView');
					$this->load->view( 'consultasWeb/templateMenuView', $this->getMenu() );
					$this->load->view( $pathView , $data ); //4
			}
			else{
					echo "No se puede renderizar";
			}

	}

	/**
	 * Funcionalidad que se encarga de obtener las placas de los vehículos
	 * asociadas a un usuario.
	*/
	public function getListaAutos()
	{
		$this->load->model('vehiculos');
		$results = $this->vehiculos->vehiculosPropietario( $this->getIdUsuario()  ) ;
		$listaAutos = array();
		if( $results !=FALSE )//1
		{
			foreach( $results as $vehiculo ){//2
				$auto = array();
			 	$auto[ 'id' ] 	  = $vehiculo->id_vehiculo;
				$auto[ 'placa' ]  = $vehiculo->placa ;
				$auto[ 'marca' ]  = $vehiculo->marca ;
				$auto[ 'modelo' ] = $vehiculo->modelo;
				$listaAutos [] = $auto;//3
			}
		}
		return $listaAutos;//4
	}
	/**
	 * Función que se encarga de obtener el identificador del usuario  sesión en el sistema.
	 *
	 * @return Identificador del usuario.
	*/
	public  function getIdUsuario(){
		$this->session = $this->session->userdata('peajetron');
		$idUsuario = $this->session['id_usuario'];//1
		setcookie( 'iduser', $idUsuario );
		return $idUsuario;//2
	}

	/**
	 * Funcion que se encarga de retornar la fuente de información a generar en
   * formato PDF.
	 * @return dataSource en formato json.
	*/
	public function getDataSource()
	{
		 echo	$_COOKIE['dataSource'];
	}

	public function getMenu(){
		$user  = $this->usuarios->getUsuario( $_COOKIE['iduser'] );
		$menu = array(
			'menu'  =>  $this->menu->ensamblar($user->id_perfil ),
			'usuario' =>$user->nombre,
		);
    	return $menu;
	}

}
