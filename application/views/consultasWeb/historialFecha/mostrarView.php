
		<h2>Lista de peajes cruzados </h2>
		<?php if ( $status ) : ?>
			<div class="ayuda">
					<button id="ayuda"> Ayuda</button>
					<div>
						<script>
							$(function(){
								$( "#ayuda").bind( 'click', function(){
									bootbox.alert("<b>Historial de Peajes cruzados</b><p>1. Para mostrar la lista de peajes por las cuales ha cruzado un vehiculo debe seleccionar el vehiculo  </p><p>2. Seleccione un rango de fecha en las cuales desea filtrar </p><p>Luego de seleccionar las fechas se presenta la lista de peajes por el que cruzo el vehiculo</p>");
								} );
							});
							
						</script>
					</div>
				</div>
			<div class="well">
				<p> A continuación se muestra la lista de los peajes por los cuales ha cruzado el vehículo <?php echo $marca . " " .$modelo ; ?> con placa <b> <?php echo $placa;?> </b> </p>
				<p> Fechas seleccionadas por el usuario</p>
				<p> <b> Fecha Inicio: </b> <?php echo $fechaInicial; ?> </p>
				<p> <b> Fecha Final: </b> <?php echo $fechaFinal; ?> </p>
			</div>
			<table cellpadding="0" cellspacing="0" border="0" class="table-boot table-boottable table-striped table-bordered">
			<thead>
			    <tr class="odd gradeX">
			      <th>Peaje </th>
			      <th>Ruta </th>
			      <th>Fecha de cruce</th>
			      <th>Hora</th>
			      <th>Valor </th>
			    </tr>
			</thead>
			<?php
				foreach( $peajes as $peaje )
				{
					echo "<tr class='odd gradeX'>
							<td>".$peaje['peaje']."</td>
							<td>".$peaje['ruta']."</td>
							<td>".$peaje['fechaCruce']."</td>
							<td>".$peaje['hora']."</td>
							<td>".$peaje['valor']."</td>
						</tr>";
				}
			?>
			</table>
			
		<?php else : ?>
			<div class="alert alert-info">
				El usuario no presenta ningún registro  de cruce por peaje del vehículo <?php echo $marca . " " .$modelo ; ?> con placa <b> <?php echo $placa;?> </b>
			</div>
		<?php endif; ?>
		</div>

		<div class="css-js">
				<script asyn type="text/javascript" src="<?php echo base_url('assets/js/pdfmake.js');?>"></script>
				<script asyn type="text/javascript" src="<?php echo base_url('assets/js/vfs_fonts.js');?>"></script>
				<script asyn type="text/javascript" src="<?php echo base_url('assets/js/reportes/exporter.js');?>"></script>
				<script type="text/javascript" src="<?php echo base_url('assets/js/reportes/historialPeajesFecha.js');?>" > </script>
		</div>


	</body>
</html>
