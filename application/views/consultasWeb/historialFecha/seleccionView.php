
			<h1> Historial de peajes Cruzados por Fecha  </h1>
			<div class="ayuda">
					<button id="ayuda"> Ayuda</button>
					<div>
						<script>
							$(function(){
								$( "#ayuda").bind( 'click', function(){
									bootbox.alert("<b>Historial de Peajes cruzados por fecha</b><p>1. Para mostrar la lista de peajes por las cuales ha cruzado un vehiculo debe seleccionar el vehiculo  </p><p>2. Seleccione un rango de fecha en las cuales desea filtrar </p><p>Luego de seleccionar las fechas se presenta la lista de peajes por el que cruzo el vehiculo</p>");
								} );
							});
							
						</script>
					</div>
				</div>
			   <?php if ( $status ) : ?>
				    <div>
						<?php
							echo form_open( site_url() .'/consultasWeb/historialPeajesFecha/seleccioneFecha');
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
