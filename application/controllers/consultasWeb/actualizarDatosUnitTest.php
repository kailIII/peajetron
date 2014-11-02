<?php

include_once( 'actualizarDatos.php' );
/**
 * Clase que se encarga de realizar las pruebas de caja blanca disenadas.
*/
class ActualizarDatosUnitTest extends  CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->library('unit_test');
  }

  public function testIndex(){

  }

  public function testActualizar(){
    //24
    $this->session->unset_userdata('peajetron');
    $sess_array = array(
      'id_usuario' => '1032',
      'id_perfil' => '3',
      'nombre' => 'Cristian Chaparro ',
      'correo' => 'cristianchaparroa@gmail.com',
      'activo' => TRUE,
      'controlador' => 'controlador'
    );
    $this->session->set_userdata( 'peajetron', $sess_array );
    $this->controller = new  ActualizarDatos();
    $_POST['telefono'] = '3124388478';
    $_POST['correo'] = 'nuevocorreo@gmail.com';
    $test = $this->controller->actualizar();
  }

  public function testValidateField()
  {
    //25
    // $value = 'Is your name O\’reilly';
    // $this->controller = new  ActualizarDatos();
    // $test = $this->controller->validateField( $value );
    // $expected = "Is your name O’reilly";
    // echo $this->unit->run( $test, $expected, '');

    //26
    $value = "<a href='test'>Test</a>";
    $this->controller = new  ActualizarDatos();
    $test = $this->controller->validateField( $value );
    echo $test;
    $expected = "&lt;a href=&#039;test&#039;&gt;Test&lt;/a&gt";
    echo $this->unit->run( $test, $expected, '');
  }
  public  function index(){
    //$this->testActualizar();
    $this->testValidateField();
  }
}
