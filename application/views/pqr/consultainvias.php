




	<div class="inicio">
		<p>Formulario</p>
		<?php echo validation_errors(); ?>
		<p><?php if(isset($vista)){ 
			$imp = explode(";", $vista);
			
			foreach ($imp as $value) {
				$valor = explode("-",$value);
				echo "<a href='consultarPQR/".$valor[0]."'>".$value."</a><br/>";
			}
			
			
			} ?></p>
		

	</div>



