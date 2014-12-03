


	<div class="inicio">
		<p>Formulario</p>
		<?php echo validation_errors(); ?>
		<?php 
			
$options = array(
                  'pregunta'  => 'Pregunta',
                  'queja'    => 'Queja',
                  'reclamo'    => 'Reclamo',

                );
			echo form_open('pqr/gestorpqr/registrarDatos/');
			echo form_label('Mensaje', 'mensaje');
			echo form_input('mensaje');echo '<br>';    
			echo form_label('Tipo Solicitud', 'tipo');
			echo form_dropdown('tipo',$options,'large');echo '<br>';  
			echo form_submit('botonSubmit', 'Enviar');
			echo form_close();
		
		?>
		
		

	</div>



