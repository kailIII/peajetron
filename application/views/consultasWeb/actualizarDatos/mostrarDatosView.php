		<h2>Actualizar Datos</h2>
		<p> A continuación se muestra la información del usuario. </p>
		<div id="datos-usuario" class="well">
			<p> <b> Nombre:  </b> <?php echo $nombre ?> </p>
			<p> <b> Documento: </b> <?php echo $documento ?> </p>
			<p> <b> Dirección </b> <?php echo $direccion ?> </p>
			<p> <b> Correo: </b>  </p>
		</div>
		<div id="datos-moodificar">
			<?php
				echo form_open( site_url() .'/consultasWeb/actualizarDatos/actualizar', $attributesForm);
			?>
			<div class="content-from well">
				<div class="form-group">
					<label for="telefono"> Teléfono : </label>
					<input type="tel" name="telefono"  value="<?php echo $telefono ?>" required="required">
				</div>
				<div class="form-group">
					<label for="correo"> Correo: </label>
					<input type="email" name="correo" value="<?php echo $correo ?>" required="required">
				</div>
			</div>

			<div id="botones-lista">
				<button class="btn btn-success" type="submit" accesskey="a">Actualizar</button>
			</div>
			<?php
				echo form_close();
			?>
		</div>
	</div><!--END CONTAINTER DIV-->

	<div class="css-js">
		<script asyn type="text/javascript" src="<?php echo base_url('assets/js/jquery.validate.min.js');?>"></script>
		<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.2/css/bootstrapValidator.min.css"/>
		<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.2/js/bootstrapValidator.min.js"></script>
		<script asyn type="text/javascript" src="<?php echo base_url('assets/js/validaciones/actualizarDatos.validar.js');?>"></script>
	</div>

	</body>
</html>