<?php


include_once 'ConsultasWebController.php';

/**
 * Clase que se encarga de generar controlar la funcionalidad de
 * historial de peajes de un usuario registrado.
 */
class HistorialPeajes extends  ConsultasWebController
{
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
	 * seleccionar historial de peajes cruzados.
	 * */
	public function index()
	{
		$this->inicializar( 'consultasWeb/historial/seleccionView' );
	}
	/*
	 * Función que se encarga de obtener una lista de los
	 * peajes por los cuales ha cruzado el propietario de un
	 * automovil.
	 */
	 public function mostrarPeajes()
	 {
		  $idVehiculo =  $this->input->post('placa');
	    $results = $this->cobros->listarPeajesCruzados( $idVehiculo, $this->getIdUsuario()  );
	    if( $results == FALSE  )//1
	    {
		    	$data = array(
						'status' => FALSE,
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
					setcookie( 'dataSource', json_encode($listaCobros) );
					$vehiculo = $this->vehiculos->buscarById( $idVehiculo );
					$string_vehiculo = $vehiculo->placa. " "  . $vehiculo->marca ." ". $vehiculo->modelo;
					$data = array(
						'status' => TRUE,
							'peajes' => $listaCobros,
							'auto'   => $string_vehiculo,
							'placa'  => $vehiculo->placa,
							'marca'  => $vehiculo->marca ,
							'modelo' => $vehiculo->modelo,
					);//6
			}
			$this->load->view( 'consultasWeb/templateHeaderView');
			$this->load->view( 'consultasWeb/templateMenuView');
			$this->load->view( 'consultasWeb/historial/mostrarView', $data );//7
	 }
}
