<?php

include_once( 'historialPeajesFecha.php' );

class HistorialPeajesFechaUnitTest extends  CI_Controller
{
    public function __construct()
    {
      parent::__construct();
      $this->load->library('unit_test');
    }

    public function testMostrarPeajes()
    {
      //13
      // $this->session->unset_userdata('peajetron');
      // $sess_array = array(
      //   'id_usuario' => '1032',
      //   'id_perfil' => '3',
      //   'nombre' => 'Cristian Chaparro',
      //   'correo' => 'cristianchaparroa@gmail.com',
      //   'activo' => TRUE,
      //   'controlador' => 'controlador'
      // );
      //
      // $this->session->set_userdata( 'peajetron', $sess_array );
      // $this->controller = new  HistorialPeajesFecha();
      // $_POST['idVehiculo'] = '1';
      // $_POST['fechaInicial'] = '2013-01-01';
      // $_POST['fechaFinal'] = '2013-02-01';
      // $this->fechaFinal   = $this->input->post('');
      // $test = $this->controller->mostrarPeajes();


      //14
      // $this->session->unset_userdata('peajetron');
      // $sess_array = array(
      //   'id_usuario' => '1032',
      //   'id_perfil' => '3',
      //   'nombre' => 'Cristian Chaparro',
      //   'correo' => 'cristianchaparroa@gmail.com',
      //   'activo' => TRUE,
      //   'controlador' => 'controlador'
      // );
      //
      // $this->session->set_userdata( 'peajetron', $sess_array );
      // $this->controller = new  HistorialPeajesFecha();
      // $_POST['idVehiculo'] = '1';
      // $_POST['fechaInicial'] = '';
      // $_POST['fechaFinal'] = '';
      // $this->fechaFinal   = $this->input->post('');
      // $test = $this->controller->mostrarPeajes();

      //15
      // $this->session->unset_userdata('peajetron');
      // $sess_array = array(
      //   'id_usuario' => '1032',
      //   'id_perfil' => '3',
      //   'nombre' => 'Cristian Chaparro',
      //   'correo' => 'cristianchaparroa@gmail.com',
      //   'activo' => TRUE,
      //   'controlador' => 'controlador'
      // );
      //
      // $this->session->set_userdata( 'peajetron', $sess_array );
      // $this->controller = new  HistorialPeajesFecha();
      // $_POST['idVehiculo'] = '1';
      // $_POST['fechaInicial'] = '2013-01-01';
      // $_POST['fechaFinal'] = '2014-10-19';
      // $this->fechaFinal   = $this->input->post('');
      // $test = $this->controller->mostrarPeajes();
    }

    public function index(){
      $this->testMostrarPeajes();
    }

}
