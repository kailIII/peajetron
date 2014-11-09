<?php

class UltimoPagoService extends  CI_Controller{
    public function __construct()
    {
      parent::__construct();

      $this->load->model( 'factura' );
    }
    public function index()
    {
      if( isset($_REQUEST['id']) &&  $_REQUEST['id']!=''  )
        {
        
        $results = $this->factura->ultimoPago($_REQUEST['id']);
         $last=$results[0] ;
         echo json_encode(array("status" => true, "fecha" =>$last->fechaPagado,"valor" =>$last->valor));
    }
         else{
            $json =  array( 'status'=>FALSE );
            echo json_encode( $json );
        }
      }
}