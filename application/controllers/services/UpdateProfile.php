<?php

class UpdateProfile extends  CI_Controller{
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
    "state"=>true);
            echo json_encode( $json );
    }
}