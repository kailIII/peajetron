
			<h1> Historial de Pagos</h1>
			<script>
							$(function(){
								$( "#ayuda").bind( 'click', function(){
									bootbox.alert("<b>Historial de pagos</b><p>1. Para mostrar  el historial de pagos  
										de un vehiculo debe seleccionar la placa del vehiculo  y luego se muestra una tabla de resultados</p>");
								} );
							});
							
						</script>
			<?php if ( $status ) : ?>
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
			<?php else : ?>
				<div class="alert alert-info">
					El usuario  no es propietario de ningún vehículo
				</div>
			<?php endif; ?>
	</body>
</html>
