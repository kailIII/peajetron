


	<div class="inicio">
		<p>Formulario</p>
		<?php echo validation_errors(); ?>
		<?php 
			

			echo form_open('pqr/gestorpqr/registrarDatos/');
			echo form_label('Mensaje', 'mensaje');
			echo form_input('mensaje');echo '<br>';    
			echo form_label('Tipo Solicitud', 'tipo');
			echo form_input('tipo');echo '<br>';  
			echo form_submit('botonSubmit', 'Enviar');
			echo form_close();
		
		?>
		
		

	</div>



