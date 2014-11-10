<?php
include_once 'consultasWebController.php';
/*
 * Controlador que se encarga de generar el historial de pagos
 * de un usuario
 **/
class HistorialPagos extends  ConsultasWebController
{
	/*
	 * Constructor de la clase.
	 */
	public function __construct(){
		parent::__construct();
		$this->load->model( 'factura' );
    #
	}
	/*
	 * Método que inicializa el controlador de historial de pagos.
	 *
	 * */
	public function index()
	{
		$this->inicializar('consultasWeb/historialPagos/seleccionView');
	}
	/*
	 * Función que se encarga de mostrar los pagos que ha realizado una persona
	 * sobre un vehículo en especifico.
	 * */
	public function mostrarPagos()
	{
		$idVehiculo =  $this->input->post('placa');
	  $results = $this->factura->listarHistorialPagos( $idVehiculo, $this->getIdUsuario()  );

		$vehiculo = $this->vehiculos->buscarById( $idVehiculo );
		$string_vehiculo = $vehiculo->placa. " "  . $vehiculo->marca ." ". $vehiculo->modelo;

		$data = array(
			'auto'   => $string_vehiculo,
			'placa'  => $vehiculo->placa,
			'marca'  => $vehiculo->marca ,
			'modelo' => $vehiculo->modelo,
		);//
		if( $results == FALSE  )//1
		{
				$data ['status'] = FALSE;
		}
		else
		{
				$listaFacturas = array();//3
				foreach( $results as $factura )//4
				{
					$facture = array();
					$facture[ 'fechaCorte' ]  = $factura->fechaCorte;
					$facture[ 'fechaPago' ]  = $factura->fechaPago ;
					$facture[ 'codigo' ] = $factura->codigo;
					$facture[ 'valor' ] = $factura->valor;
					$listaFacturas [] = $facture;//5
				}
				setcookie( 'dataSource', json_encode($listaFacturas) );
				$data ['status'] = TRUE;
				$data ['facturas'] = $listaFacturas;
		}
		$menu = $this->getMenu();
		$this->load->view( 'consultasWeb/templateHeaderView');
		$this->load->view( 'consultasWeb/templateMenuView', $menu );
		$this->load->view( 'consultasWeb/historialPagos/mostrarView', $data );//7

	}
}
