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
      if( isset($_REQUEST['id']) &&  $_REQUEST['id']!='' && isset($_REQUEST['email']) &&  $_REQUEST['email']!='' && isset($_REQUEST['cellPhone']) &&  $_REQUEST['cellPhone']!='' )
        {
            
           $idUser  = $_REQUEST['id'];
           $correo  = $_REQUEST['email'];
           $telefono = $_REQUEST['cellPhone'];

           $result= $this->usuarios->actualizarDatos( $idUser, $correo, $telefono);
           echo json_encode(array("status" => true));
        }
        else{
            $json =  array( 'status'=>FALSE );
            echo json_encode( $json );
        }

}
}