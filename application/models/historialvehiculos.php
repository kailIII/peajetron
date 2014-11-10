<?php

/**
 * CodeIgniter
 *
 * An open source application development framework for PHP 5.1.6 or newer
 *
 * @package		CodeIgniter
 * @author		ExpressionEngine Dev Team
 * @copyright           Copyright (c) 2008 - 2014, EllisLab, Inc.
 * @license		http://codeigniter.com/user_guide/license.html
 * @link		http://codeigniter.com
 * @since		Version 1.0
 * @filesource
 */

/**
 * CodeIgniter HistorialVehiculos_model Class. 
 *
 * @package     models
 * @subpackage	modulo61
 * @author	Josè David Moreno Posada
 */
class historialVehiculos extends CI_Model{
    
    /**
     * Constructor de la clase. Inicializa la conexión con la base de datos.
     */
    function __construct(){
        $this->load->database();
    }
      
    /**
     * Obtiene los peajes almacenados en la base de datos.
     * @return result_array Arreglo asociativo en donde cada indice corresponde
     * al nombre de la columna almacenado en la base de datos.
     */
    public function obtenerHistorialByRangoFechaAndPlaca($fechaInicio, 
                                                  $fechaFin, $placa){       
        $query = $this->db->query('SELECT p.name, '
                                       . 'p.address, '
                                       . 'p.lat, '
                                       . 'p.lng, '
                                       . 'hv.fecha '
                                . 'FROM vehiculo v, '
                                     . 'historialvehiculo hv, '
                                     . 'peaje p '
                                . 'WHERE hv.idPeaje = p.idPeaje '
                                    . 'AND hv.idVehiculo = v.idVehiculo '
                                    . 'AND v.placa LIKE \''.$placa.'%\' '
                                    . 'AND DATE(hv.fecha) '
                                    . 'BETWEEN \''.$fechaInicio.'\' '
                                    . 'AND \''. $fechaFin . '\'');
        $result = $this->db->query($query);
        if($result->num_rows() > 0){      
            return $result->result_array();
        } else {
            $result = $this->verificarExistenciaVehiculo($placa);
            return $result;
        }
    }
    
    /**
     * Verifica la existencia del vehiculo en la base de datos. Si existe
     * el vehiculo retornara codigo 61006 en caso contrario retornara codigo
     * 61002.
     * @param string $placa Cadena de caracteres con la placa que se desea 
     * comparar.
     * @return string Cadena de caracter con el código 61002 en caso de que no
     * se encuentren vehiculos almacenados en la base de datos o código 61006
     * indicando que no se encontrarón registros.
     */
    private function verificarExistenciaVehiculo($placa) {
        $query = $this->db->query('SELECT * '
                                . 'FROM vehiculo '
                                . 'WHERE placa LIKE \''.$placa.'%\'');
        $result = $this->db->query($query);
        if($result->num_rows() > 0){      
            $result = "61006";
            return $result;
        } else {
            $result = "61002";
            return $result;
        }   
    }
    
}
