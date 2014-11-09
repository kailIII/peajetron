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


        if( isset( $_REQUEST['id'])  )
        {
            $idUser  = $_REQUEST['id'];
            $result =  $this->vehiculos->vehiculosPropietario( $idUser );
            if( $result!=FALSE)
            {
               $placas = array();
               foreach( $results as $vehiculo )
               {
                  $id = $vehiculo->id_vehiculo;
                  $placa = $vehiculo->placa;
                  $cobro = $this->cobros->ultimPeajeCruzado( $id, $idUser );

                  if( $cobro != FALSE )
                  {
                     $placa = array(
                       'placa'     => $placa,
                       'valor'     => $cobro->valor,
                       'matricula' => $placa,
                       'ruta'      => $cobro->hora,
                       'fecha'     => $cobro->fecha,
                       'ubicacion' => 'nose'
                     );
                     $placas [] = $placa;
                     $placas['status'] = TRUE;
                  }//fin if cobro false
               }//endforeach
               echo json_encode($placas );
            }//endif
        }
        $json =  array( 'status'=>FALSE );
        echo json_encode( $json );
    }
}
