<?php

class UltimoMesService extends  CI_Controller{
    public function __construct()
    {
      parent::__construct();
      $this->load->model('usuarios');
      $this->load->model('vehiculos');
      $this->load->model('cobros');
      $this->load->model( 'factura' );
    }
    public function index()
    {

      if( isset($_REQUEST['id']) &&  $_REQUEST['id']!=''  )
        {

          /*
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
                } */
            $idUser  = $_REQUEST['id'];
            $result =  $this->vehiculos->vehiculosPropietario( $idUser );
            if( $result!=FALSE)
            {
               $placas = array();
               foreach( $result as $vehiculo )
               {
                  $id = $vehiculo->id_vehiculo;
                  $placa = $vehiculo->placa;
                  $factura = $this->factura->ultimoMes( $idUser, $id );

                  if( $factura != FALSE )
                  {
                     $placa = array(
                       'placa'     => $placa,
                       'precio'     => $factura->valor,
                       'fecha'     => $factura->fechaCorte
                     );
                     $placas [] = $placa;
                    
                  }//fin if cobro false
               }//endforeach
               $json  = array(
                   'placas' => $placas,
                   'status' => TRUE,
               );
               echo json_encode($json );
            }//endif

        }
        else{
            $json =  array( 'status'=>FALSE );
            echo json_encode( $json );
        }

    }
}
