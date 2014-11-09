<?php

class UltimoPeajeService extends  CI_Controller{
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
            $result =  $this->vehiculos->vehiculosPropietario( $idUser );
            if( $result!=FALSE)
            {
               $placas = array();
               foreach( $result as $vehiculo )
               {
                  $id = $vehiculo->id_vehiculo;
                  $placa = $vehiculo->placa;
                  $cobro = $this->cobros->ultimoPeajeCruzado( $id, $idUser );

                  if( $cobro != FALSE )
                  {
                     $placa = array(
                       'placa'     => $placa,
                       'valor'     => $cobro->valor,
                       'matricula' => $placa,
                       'ruta'      => $cobro->ruta,
                       'hora'      => $cobro->hora,
                       'fecha'     => $cobro->fecha,
                       'ubicacion' => $cobro->peaje
                     );
                     $placas [] = $placa;
                    
                  }//fin if cobro false
               }//endforeach
               $json  = array(
                   'placas' =>  $placas,
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
