<?php
class CobrosUnitTest extends  CI_Controller
{
  public function __construct(){
    parent::__construct();
    $this->load->model('cobros');
    $this->load->library('unit_test');
  }

  /**
   * MC1.
   * @covers: listarPeajesCruzados
   */
  public function testListarPeajesCruzados()
  {
    $idVehiculo =  '10';
    $idUsuario = '1234';
    $test = $this->cobros->listarPeajesCruzados( $idVehiculo,$idUsuario );
    echo $this->unit->run( $test, FALSE, 'Verificacion de listar peajes cruzados');
    //MC2
    $idVehiculo =  '1';
    $idUsuario = '1032';
    $test = $this->cobros->listarPeajesCruzados( $idVehiculo,$idUsuario ) ;
    echo $this->unit->run( count($test), 3, 'Verificacion de listar peajes cruzados');

    //MC3
    $idVehiculo =  '';
    $idUsuario = '';
    $test = $this->cobros->listarPeajesCruzados( $idVehiculo,$idUsuario ) ;
    echo $this->unit->run( $test, FALSE, 'Verificacion de listar peajes cruzados " "' );

    $idVehiculo =  NULL;
    $idUsuario = NULL;
    $test = $this->cobros->listarPeajesCruzados( $idVehiculo,$idUsuario ) ;
    echo $this->unit->run( $test, FALSE, 'Verificacion de listar peajes cruzados NULL');
  }

  public function testListarPeajesCruzadosFecha(){
    //MC4.
    // $idVehiculo =  '10';
    // $idUsuario = '1234';
    // $fechaInicial = NULL;
    // $fechaFinal = NULL;
    //
    // $test = $this->cobros->listarPeajesCruzadosFecha($idVehiculo, $idUsuario , $fechaInicial, $fechaFinal);
    // echo $this->unit->run( $test, FALSE, 'Verificacion de listar peajes cruzados NULL');

    //MC5
    // $idVehiculo =  NULL;
    // $idUsuario = NULL;
    // $fechaInicial = '2014-01-01';
    // $fechaFinal = '2014-02-20';
    //
    // $test = $this->cobros->listarPeajesCruzadosFecha($idVehiculo, $idUsuario , $fechaInicial, $fechaFinal);
    // echo $this->unit->run( $test, FALSE, 'Verificacion de listar peajes cruzados NULL');
    //MC6
  //   $idVehiculo =  '1';
  //   $idUsuario = '1032';
  //   $fechaInicial = '2014-01-01';
  //   $fechaFinal = '2014-02-01';
  //
  //   $test = $this->cobros->listarPeajesCruzadosFecha($idVehiculo, $idUsuario , $fechaInicial, $fechaFinal);
  //   echo $this->unit->run( $test, FALSE, 'Verificacion de listar peajes cruzados NULL');
  // //   //MC7
  //   $idVehiculo =  '1';
  //   $idUsuario = '1032';
  //   $fechaInicial = '2014-10-02';
  //   $fechaFinal = '2014-10-18';
  //
  //   $test = $this->cobros->listarPeajesCruzadosFecha($idVehiculo, $idUsuario , $fechaInicial, $fechaFinal);
  //   echo $this->unit->run( count($test), 2, 'Verificacion de listar peajes cruzados NULL');
  // //   //MC8
  //   $idVehiculo =  '1';
  //   $idUsuario = '1032';
  //   $fechaInicial = '2014-02-02';
  //   $fechaFinal = '2014-10-18';
  //
  //   $test = $this->cobros->listarPeajesCruzadosFecha($idVehiculo, $idUsuario , $fechaInicial, $fechaFinal);
  //   echo $this->unit->run( count($test), 3, 'Verificacion de listar peajes cruzados NULL');
  }


  public function testUltimoPeaje()
  {
    //MC9
    $idVehiculo =  '1';
    $idUsuario = '1032';
    $test = $this->cobros->ultimoPeajeCruzado( $idVehiculo, $idUsuario );
    echo $this->unit->run( count($test), 1, 'Verificacion de listar peajes cruzados " "' );

    //MC10
    $idVehiculo =  '1';
    $idUsuario = '';
    $test = $this->cobros->ultimoPeajeCruzado( $idVehiculo, $idUsuario );
    echo $this->unit->run( count($test), 1, 'Verificacion de listar peajes cruzados " "' );
    //MC11
    $idVehiculo =  '';
    $idUsuario = '1032';
    $test = $this->cobros->ultimoPeajeCruzado( $idVehiculo, $idUsuario );
    echo $this->unit->run( count($test), 1, 'Verificacion de listar peajes cruzados " "' );
    //MC12
    $idVehiculo =  '';
    $idUsuario = '';
    $test = $this->cobros->ultimoPeajeCruzado( $idVehiculo, $idUsuario );
    echo $this->unit->run( count($test), 1, 'Verificacion de listar peajes cruzados " "' );
    //MC13
    $idVehiculo =  NULL;
    $idUsuario = NULL;
    $test = $this->cobros->ultimoPeajeCruzado( $idVehiculo, $idUsuario );
    echo $this->unit->run( count($test), 1, 'Verificacion de listar peajes cruzados " "' );

  }
  public function index()
  {
    //$this->testListarPeajesCruzados();
    //$this->testListarPeajesCruzadosFecha();
    $this->testUltimoPeaje();
  }
}
