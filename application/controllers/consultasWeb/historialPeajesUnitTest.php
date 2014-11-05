<?php


include_once( 'historialPeajes.php' );

class HistorialPeajesUnitTest extends  CI_Controller
{
    public function __construct()
    {
      parent::__construct();
      $this->load->library('unit_test');
    }

    /**
     * @cover:
    */
    public function testMostrarPeajes()
    {

      //11.
      // $this->session->unset_userdata('peajetron');
      //
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
      // $this->controller = new  HistorialPeajes();
      // $_POST['placa'] = '10';
      // $test = $this->controller->mostrarPeajes();
      //

      //12
      $this->session->unset_userdata('peajetron');
      $sess_array = array(
        'id_usuario' => '1032',
        'id_perfil' => '3',
        'nombre' => 'Andres cobos',
        'correo' => 'andogozon@gmail.com',
        'activo' => TRUE,
        'controlador' => 'controlador'
      );

      $this->session->set_userdata( 'peajetron', $sess_array );
      $this->controller = new  HistorialPeajes();
      $_POST['placa'] = '1';
      $test = $this->controller->mostrarPeajes();
    }


    /**
     * Función que se encarga de correr las pruebas.
    */
    public function index(){
      $this->testMostrarPeajes();
    }
}
