

	<div class="inicio">
		<p>Ingrese los datos</p>
		<?php echo validation_errors(); ?>
		<?php 
			echo form_open('pqr/gestorpqr/remitirQueja/'.$radicado);			
			echo form_label('Elija el departamento:', 'radicado');
			echo form_dropdown('encargado', $queja, 'large'); 
			echo form_submit('botonSubmit', 'Enviar Remision');
			echo form_close();
		
		 ?>
		

	</div>
	
