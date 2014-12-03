
			<h1> Ultimo peaje Cruzado </h1>
					<script>
							$(function(){
								$( "#ayuda").bind( 'click', function(){
									bootbox.alert("<b>Último peaje cruzado</b><p>1. Para mostrar  el ultimo peaje cruzado 
										de un vehiculo debe seleccionar la placa del vehiculo  y luego se muestra el resultado</p>");
								} );
							});
							
						</script>
				<?php if ( $status ) : ?>
				    <div>
						<?php
							echo form_open( site_url() .'/consultasWeb/ultimoPeaje/mostrarUltimoPeaje');
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
