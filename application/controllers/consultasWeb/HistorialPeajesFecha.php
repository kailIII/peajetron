<?php


include_once 'ConsultasWebController.php';

/*s
 * Clase que se encarga de Controlar los eventos generados
 * en la vista Historial de peajes cruzados por fechas.
 *
 */
class HistorialPeajesFecha  extends  ConsultasWebController
{
	/*
	 * Variable en la cual se aloja el facha inicial seleccionada
	 * por el usuario para realizar el filtro por fechas para obtener
	 * los peajes cruzados de un vehículo.
	 */
	private $fechaInicial;
	/*
	 * Variable en la cual se aloja el facha final seleccionada
	 * por el usuario para realizar el filtro por fechas para obtener
	 * los peajes cruzados de un vehículo.
	 */
	private $fechaFinal;

	/*
	 * Identificador del vehículo que se ha seleccionado para generar el reporte.
	*/
	public $idVehiculo;
	/*
	 * Constructor de la clase.
	 */
	public function __construct(){
		parent::__construct();
		$this->load->model('vehiculos');
		$this->load->model('cobros');
	}
	/*
	 * Función que se encarga de inicializar el controlador al
	 * seleccionar historial de peajes cruzados por fechas.
	 * */
	public function index()
	{
		$this->inicializar( 'consultasWeb/historialFecha/seleccionView' );
	}
	/*
	 * Método el cual se encarga de capturar las fechas que ha seleccionado
	 * el usuario para filtrar los peajes cruzados por un vehículo.
	 * */
	public function seleccioneFecha()
	{
		$this->idVehiculo =  $this->input->post('placa');
		$data = array(
			'idVehiculo' => $this->idVehiculo,
			'attributesForm' => array('id' => 'form_seleccion_fecha'),
		);
		$this->load->view( 'consultasWeb/templateHeaderView');
		$this->load->view( 'consultasWeb/templateMenuView', $data );
		$this->load->view( 'consultasWeb/historialFecha/seleccioneFechaView', $data );//1
	}
	/*
	 * Función que se encarga de obtener una lista de los
	 * peajes por los cuales ha cruzado el propietario de un
	 * automovil.
	 */
	public function mostrarPeajes()
	{
		$this->idVehiculo =  $this->input->post('idVehiculo');
		$this->fechaInicial = $this->input->post('fechaInicial');
		$this->fechaFinal   = $this->input->post('fechaFinal');
	    $results = $this->cobros->listarPeajesCruzadosFecha( $this->idVehiculo,  $this->getIdUsuario() , $this->fechaInicial, $this->fechaFinal );
	    $vehiculo = $this->vehiculos->buscarById( $this->idVehiculo );
		$string_vehiculo = $vehiculo->placa. " "  . $vehiculo->marca ." ". $vehiculo->modelo;
	    if( $results == FALSE  )//1
	    {
	    	$data = array(
				'status' => FALSE,
				'auto'   => $string_vehiculo,
	 			'placa'  => $vehiculo->placa,
	 			'marca'  => $vehiculo->marca ,
	 			'modelo' => $vehiculo->modelo,
			);//2
	    }
	    else
		{
			$listaCobros = array();//3
			foreach( $results as $cobro )//4
			{
				$cruce = array();
				$cruce[ 'peaje' ]  = $cobro->peaje;
				$cruce[ 'ruta' ]  = $cobro->ruta ;
				$cruce[ 'fechaCruce' ] = $cobro->fecha;
				$cruce[ 'hora' ] = $cobro->hora;
				$cruce[ 'valor' ]  = $cobro->valor ;
				$listaCobros [] = $cruce;//5
			}
			$data = array(
				'status' => TRUE,
	 			'peajes' => $listaCobros,
	 			'auto'   => $string_vehiculo,
	 			'placa'  => $vehiculo->placa,
	 			'marca'  => $vehiculo->marca ,
	 			'modelo' => $vehiculo->modelo,
	 			'fechaInicial' => $this->fechaInicial,
	 			'fechaFinal' => $this->fechaFinal
	 		);//6

		}
		$this->load->view( 'consultasWeb/templateHeaderView');
		$this->load->view( 'consultasWeb/templateMenuView', $data );
		$this->load->view( 'consultasWeb/historialFecha/mostrarView', $data );//7
	}
}
