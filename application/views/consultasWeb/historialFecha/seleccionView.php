
			<h1> Historial de peajes Cruzados  </h1>
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
		</div>
	</body>
</html>




