<?php 
class GestorCorreo extends CI_Controller {
	/**
	 * Envio el correo con la información de las PQR
	 * @param query
	 * @return boolean
	 * 
	 * */
	public function enviarPQR($queja){
		try{
			//cargamos la libreria email de ci
			$this->load->library("email"); 
			$this->load->model('Modelo_pqr', '', TRUE);
			$this->email->from('admin@peajetron.com', 'Peajetron');
			$correo = $this->Modelo_pqr->obtenerCorreo($queja->usuarioingresa);
			$this->email->to($correo->correo);              
				if($queja->tematerminado === '1'){
					$this->email->subject('Respuesta de la Solicitud:'.$queja->identificador);
					 $this->email->message('<h2>Información sobre la solicitud:'.$queja->identificador.'</h2>'.
						'<p>Radicado: '.$queja->identificador.'</p><br>'.
						'<p>Tipo de solicitud: '.$queja->tiposolicitud.'</p><br>'.
						'<p>Fecha de ingreso: '.$queja->fechaingreso.'</p><br>'.
						'<p>Fecha de lectura: '.$queja->fechalectura.'</p><br>'.
						'<p>Fecha de respuesta: '.$queja->fecharespuesta.'</p><br>'.
						'<p>Mensaje de respuesta:<span> '.$queja->mensajerespuesta.'</span></p><br>'.
						'<br><br><p>Este mensaje es enviado automáticamente por el sistema gestor de PQR.</p>');  
				}else{
					$this->email->subject('Datos de la Solicitud:'.$queja->identificador);
					$this->email->message('<h2>Información sobre la solicitud:'.$queja->identificador.'</h2>'.
					'<p>Radicado: '.$queja->identificador.'</p><br>'.
					'<p>Tipo de solicitud: '.$queja->tiposolicitud.'</p>'.
					'<p>Fecha de ingreso: '.$queja->fechaingreso.'</p><br>'.
					'<p>Su Solicitud aún no ha sido respondida</p><br>'.
					'<br><br><p>Este mensaje es enviado automáticamente por el sistema gestor de PQR.</p>');  
					
					}
			return $this->email->send();
			}
			catch(Exception $e){
				return false;
				}
		}
	}
?>
