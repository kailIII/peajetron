<?php
/**
  * Clase que se encarga de proveer el menu de incia al sistema para usuarios
  * que son propietarios de un vehículo.
  *
  * @author: Fabian Danilo Caicedo.
  * @author: Cristian Camilo Chaparro A.
 */
Class Index extends   MY_Controller
{
   public function __construct()
   {
     parent::__construct();
   }
   public function index(){
     $this->load->view( 'consultasWeb/templateHeaderView');
     $this->load->view( 'consultasWeb/templateMenuView');
   }
}
