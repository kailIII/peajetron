<?php
class UsuariosUnitTest extends  CI_Controller
{
  public function __construct(){
    parent::__construct();
    $this->load->model('usuarios');
    $this->load->library('unit_test');
  }

  public function testGetUsuario(){
    //MU1
    $idUsuario = '1032';
    $test = $this->usuarios->getUsuario( $idUsuario );
    echo $this->unit->run( count($test), 1, '');
    //MU2
    $idUsuario = NULL;
    $test = $this->usuarios->getUsuario( $idUsuario );
    echo $this->unit->run( $test, FALSE, '');
    //MU3
    $idUsuario = '12342345';
    $test = $this->usuarios->getUsuario( $idUsuario );
    echo $this->unit->run( $test, FALSE, '');
  }
  public function index(){
    $this->testGetUsuario();
  }
}
