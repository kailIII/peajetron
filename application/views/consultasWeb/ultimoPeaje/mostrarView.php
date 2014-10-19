


		<h2>Último peaje cruzado  </h2>
		<?php if ( $status ) : ?>
		<div class="well">
			<p>
				A continuación se muestra el último peaje por el cual cruzó el vehículo 
				<?php echo $marca . " " .$modelo ; ?> con placa <b> <?php echo $placa;?> </b>
			</p>
		</div>
		<table id="table-boot" cellpadding="0" cellspacing="0" border="0" class=" table-boottable table-striped table-bordered">
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
				echo "<tr class='odd gradeX'>
					<td>".$peaje['peaje']."</td>
					<td>".$peaje['ruta']."</td> 
					<td>".$peaje['fechaCruce']."</td> 
					<td>".$peaje['hora']."</td> 
					<td>".$peaje['valor']."</td> 
					</tr>";	
			?>	
		</table>
		<?php else : ?>
			<div class="alert alert-info">
				El usuario no presenta ningún registro  de cruce por peaje, para el  vehículo <?php echo $marca . " " .$modelo ; ?> con placa <b> <?php echo $placa;?> </b>
			</div>
		<?php endif; ?>

		<script asyn type="text/javascript" >
			$(function(){
				$('#table-boot').DataTable( {
				    scrollY: 300,
				    paging: false,
				    searching: false,
				} );
			});
		</script>
	</body>
</html>