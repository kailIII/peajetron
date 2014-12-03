
			<h1> Historial de peajes Cruzados  </h1>
				<div class="ayuda">
					<button id="ayuda"> Ayuda</button>
					<div>
						<script>
							$(function(){
								$( "#ayuda").bind( 'click', function(){
									bootbox.alert("<b>Historial de Peajes cruzados</b><p>Para mostrar la lista de peajes por las cuales ha cruzado un vehiculo debe seleccionar el vehiculo y luego se muestra una tabla con los  peajes </p>");
								} );
							});
							
						</script>
					</div>
				</div>
				


				<?php if ( $status ) : ?>
				    <div>
						<?php
							echo form_open( site_url() .'/consultasWeb/historialPeajes/mostrarPeajes');
						?>
							<div>
								<label>Seleccione el vehículo </label>
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
						<button class="btn btn-danger"  accesskey="c">Cancelar</button>
					</div>
				<?php else : ?>
					<div class="alert alert-info">
						El usuario  no es propietario de ningún vehículo
					</div>
				<?php endif; ?>


		</div>
	</body>
</html>
