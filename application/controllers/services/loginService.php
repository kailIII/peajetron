<?php

class ActualizarDatos extends  CI_Controller{
    public function __construct()
    {
      parent::__construct();
      $this->load->model('usuarios');
      #
    }
    public function index()
    {
        $pass  = $_REQUEST['pass'];
        $email = $_REQUEST['email'];

        echo $pass;
        echo $email;
        return true;

    }
}
