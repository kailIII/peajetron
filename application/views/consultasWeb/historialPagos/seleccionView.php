
			<h1> Historial de Pagos</h1>
		    <div>
				<?php
					echo form_open( site_url() .'/consultasWeb/historialPagos/mostrarPagos');
				?>
				<div>
					<label>Seleccione el automovil</label>
					<select class="selectpicker"  name="placa">
						<?php
						foreach( $listaAutos as $auto )
						{
						    ?>
							    	<option value="<?=$auto['id']?>"> <?=$auto['placa']?> -  <?=$auto['marca']?> - <?=$auto['modelo']?>  </option>
						    <?php
						}
						?>
					</select>
				</div>
				<div id="botones-lista">
					<button class="btn btn-success" type="submit" accesskey="a">Aceptar</button>
				</div>
				<?php
					echo form_close();
				?>
			</div>
	</body>
</html>
