<?php


include_once 'ultimoPeaje.php';

class UltimoPeajeUnitTest extends   CI_Controller
{
    public function __construct()
    {
      parent::__construct();
      $this->load->library('unit_test');
    }
    /**
     *
     */
    public function testMostrarUltimoPeaje()
    {
      // 16
      // $this->session->unset_userdata('peajetron');
      // $sess_array = array(
      //   'id_usuario' => '1234',
      //   'id_perfil' => '3',
      //   'nombre' => 'Andres cobos',
      //   'correo' => 'andogozon@gmail.com',
      //   'activo' => TRUE,
      //   'controlador' => 'controlador'
      // );
      //
      // $this->session->set_userdata( 'peajetron', $sess_array );
      // $this->controller = new  UltimoPeaje();
      // $_POST['placa'] = '10';
      // $this->controller->mostrarUltimoPeaje();
      //17
      // $this->session->unset_userdata('peajetron');
      // $sess_array = array(
      //   'id_usuario' => '1032',
      //   'id_perfil' => '3',
      //   'nombre' => 'Cristian Chaparro',
      //   'correo' => 'cristianchaparroa@gmail.com',
      //   'activo' => TRUE,
      //   'controlador' => 'controlador'
      // );
      // $this->session->set_userdata( 'peajetron', $sess_array );
      // $this->controller = new  UltimoPeaje();
      // $_POST['placa'] = '1';
      // $this->controller->mostrarUltimoPeaje();

    }
    public function index(){
      $this->testMostrarUltimoPeaje();
    }
}
