
	
	<!-- </div>  Esta en el menu-->
		<h2>Actualizar Datos de Usuario </h2>

		<?php if ( $status ) : ?>
			<div class="alert alert-success">
				La información del usuario se ha actualizado exitosamente.
			</div>
		<?php else : ?>
			<div class="alert alert-danger">
				No se ha podido actualizar la información.
			</div>
		<?php endif; ?>
		<p> A continuación se muestra la información del usuario. </p>
		<div id="datos-usuario" class="well">
			<p> <b> Nombre:  </b> <?php echo $nombre ?> </p>
			<p> <b> Documento: </b> <?php echo $documento ?> </p>
			<p> <b> Dirección </b> <?php echo $direccion ?> </p>
			<p> <b> Correo: </b>  <?php echo $correo ?></p>
			<p> <b> Teléfono: </b>  <?php echo $telefono ?></p>
		</div>

	</div><!--END CONTAINTER DIV-->
	</body>
</html>