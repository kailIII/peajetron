<?php


class VehiculoUnitTest extends  CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->library('unit_test');
    $this->load->model('vehiculos');
  }
  public function testBuscarById()
  {
    //MV1
    $idVehiculo = '1';
    $test = $this->vehiculos->buscarById( $idVehiculo );
    echo $this->unit->run( count($test), 1, '');
    //MV2
    $idVehiculo = '';
    $test = $this->vehiculos->buscarById( $idVehiculo );
    echo $this->unit->run( $test, FALSE, '');
    //MV3
    $idVehiculo = NULL;
    $test = $this->vehiculos->buscarById( $idVehiculo );
    echo $this->unit->run( $test, FALSE, '');
    //MV4 
    $idVehiculo = '9';
    $test = $this->vehiculos->buscarById( $idVehiculo );
    echo $this->unit->run( $test, FALSe, '');
  }
  public function index(){
    $this->testBuscarById();
  }
}
