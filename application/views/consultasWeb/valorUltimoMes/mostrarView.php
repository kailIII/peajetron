

	<!-- </div>  Esta en el menu-->
		<h2>Lista de peajes cruzados </h2>
		<?php if ( $status ) : ?>
			<div class="well">
				<p> El valor a pagar en el último mes para vehículo
				<?php echo $marca . " " .$modelo ; ?> con placa <b> <?php echo $placa;?> </b>  es de <?php echo $valor?> </p>
			</div>
		<?php else : ?>
			<div class="alert alert-info">
					No se ha encontrado ningún valor a cancelar para el vehículo 
				<?php echo $marca . " " .$modelo ; ?> con placa <b> <?php echo $placa;?> </b>
			</div>
		<?php endif; ?>
	</div><!--END CONTAINTER DIV-->
	</body>
</html>
