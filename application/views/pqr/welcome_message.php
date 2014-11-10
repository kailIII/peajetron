



	<div class="inicio">
		<p>Formulario</p>
		<?php echo validation_errors(); ?>
		<?php 
			
			echo form_open('pqr/gestorpqr/obtenerQueja/');
			echo form_label('Radicado', 'radicado');
			echo form_input('radicado');echo '<br>';    
			echo form_submit('botonSubmit', 'Enviar');
			echo form_close();
		
		?>
		<p><?php if(isset($queja->identificador)){ 
			echo form_open('gestorpqr/responderPQR/'.$queja->identificador);			
			echo form_label('Radicado:', 'radicado');
			echo form_label($queja->identificador,'identificador');echo '<br>';  
			echo form_label('Usuario Ingresa:', 'user');
			echo form_label($queja->usuarioingresa,'usuarioIngresa');echo '<br>';    
			echo form_label('Tipo Solicitud','tipo');
			echo form_label($queja->tiposolicitud,'tipoSolicitud');echo '<br>';  
			echo form_label('Mensaje del Usuario','mensaje');
			echo form_label($queja->mensajepeticion,'tipoSolicitud');echo '<br>';
			echo form_label('Fecha de ingreso','mensaje');
			echo form_label($queja->fechaingreso,'tipoSolicitud');echo '<br>';
			
			if($queja->fechalectura!='1900-01-01'){
				echo form_label('Fecha de lectura','mensaje');
				echo form_label($queja->fechalectura,'tipoSolicitud');echo '<br>';
			}
			if($queja->tematerminado === '1'){
				echo form_label('Respuesta a la queja','mensajeResp');
				echo form_label($queja->mensajerespuesta,'tipoRespuesta');echo '<br>';
				echo form_label('Fecha de respuesta','fechaResp');
				echo form_label($queja->fecharespuesta,'tipoRespuesta');echo '<br>';
			}else{
				echo form_label('Su '.$queja->tiposolicitud.' aún no ha sido respondida.','mensajeResp');
				
				}
			echo form_close();
		
			
			} ?></p>
		
	</div>

	

