

	<div class="inicio">
		<p>Formulario</p>
		<?php echo validation_errors(); ?>
		<?php 
			echo form_open('pqr/gestorpqr/responderPQR/'.$queja->identificador);			
			echo form_label('Radicado:', 'radicado');
			echo form_label($queja->identificador,'identificador');echo '<br>';  
			echo form_label('Usuario Ingresa:', 'user');
			echo form_label($queja->usuarioingresa,'usuarioIngresa');echo '<br>';    
			echo form_label('Tipo Solicitud','tipo');
			echo form_label($queja->tiposolicitud,'tipoSolicitud');echo '<br>';  
			echo form_label('Mensaje del Usuario','mensaje');
			echo form_label($queja->mensajepeticion,'tipoSolicitud');echo '<br>';
			echo form_label('Respuesta a la queja','mensajeResp');
			echo form_input('mensajeRespuesta');echo '<br>';
			echo form_submit('botonSubmit', 'Enviar Respuesta');
			echo form_close();
		
		 ?>
		<?php echo "<a href='../consultarRemision/".$queja->identificador."'>Remitir Queja</a><br/>";?>

	</div>
	
	

