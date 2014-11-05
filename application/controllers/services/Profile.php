<?php

class Profile extends  CI_Controller{
    public function __construct()
    {
      parent::__construct();
      $this->load->model('usuarios');
      $this->load->model('vehiculos');
      $this->load->model('cobros');
    }
    public function index()
    {

 $json =  array( 
    "nombre"=>"Cesar Andres Hernandez Penagos",
    "cedula"=>"1014239597",
    "direccion"=>"av cra 91 n 131",
    "telefono"=>"3115216023",
    "correo"=>"ceimox19@gmail.com",
    "state"=>true);
            echo json_encode( $json );
    }
}