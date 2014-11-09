

	<!-- </div>  Esta en el menu-->
		<h2>Lista de peajes cruzados </h2>


		<?php if ( $status ) : ?>
			<div class="well">
				<p> A continuación se muestra la lista de los peajes por los cuales ha cruzado el vehículo <?php echo $marca . " " .$modelo ; ?> con placa <b> <?php echo $placa;?> </b> </p>
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

			<div>
					<button class="btn btn-success" id="descargar" value="Descargar PDF" > Descargar PDF</button>
			</div>
		<?php else : ?>
			<div class="alert alert-info">
				El usuario no presenta ningún registro  de cruce por peaje del vehículo seleccionado
		  </div>
		<?php endif; ?>
	</div><!--END CONTAINTER DIV-->

	<div class="css-js">
			<script asyn type="text/javascript" src="<?php echo base_url('assets/js/pdfmake.js');?>"></script>
			<script asyn type="text/javascript" src="<?php echo base_url('assets/js/vfs_fonts.js');?>"></script>
			<script asyn type="text/javascript" src="<?php echo base_url('assets/js/reportes/exporter.js');?>"></script>
			<script type="text/javascript" src="<?php echo base_url('assets/js/reportes/historialPeajes.js');?>" > </script>
	</div>
	</body>

</html>
