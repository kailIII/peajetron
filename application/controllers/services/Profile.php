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
      if( isset($_REQUEST['id']) &&  $_REQUEST['id']!=''  )
        {
            
           $idUser  = $_REQUEST['id'];
           $result= $this->usuarios->getUsuarioService( $idUser);
           echo json_encode(array("status" => true, "nombre" =>$result->nombre,"cedula" =>$result->documento,"telefono" =>$result->telefono,"direccion" =>$result->direccion,"correo" =>$result->correo));
        }
        else{
            $json =  array( 'status'=>FALSE );
            echo json_encode( $json );
        }

}
}

