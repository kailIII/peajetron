<?php

class LoginService extends  CI_Controller{
    public function __construct()
    {
      parent::__construct();
      $this->load->model('usuarios');
      #
    }
    public function index()
    {
      if( isset($_REQUEST['pass']) &&  $_REQUEST['pass']!='' && isset($_REQUEST['email']) &&  $_REQUEST['email']!=''  )
        {
        $pass  = $_REQUEST['pass'];
        $email = $_REQUEST['email'];
        echo $this->usuarios->login( $email, $pass );}
        else{
            $json =  array( 'status'=>false );
            echo json_encode( $json );
        }
    }
}
