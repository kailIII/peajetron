<?php

class UltimoMesService extends  CI_Controller{
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
            $valorTotal=0;
            $result =  $this->vehiculos->vehiculosPropietario( $idUser );
            if( $result!=FALSE)
            {
               foreach( $result as $vehiculo )
               {
                    $id = $vehiculo->id_vehiculo;
                    $valor = $this->cobros->valorUlitmoMes( $id, $idUser );
                    $valorTotal = $valorTotal+$valor->sum;
                  }
                  $monto=(string)$valorTotal;
                  $json =  array( 'monto'=>$monto,'fecha'=>'10/12/2014','status' => TRUE);
                  echo json_encode( $json );
                } 
        }
        else{
            $json =  array( 'status'=>FALSE );
            echo json_encode( $json );
        }

    }
}