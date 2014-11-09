
		<h2>Historial de pagos  </h2>
		<?php if ( $status ) : ?>
			<div class="well">
				<p> A continuación se muestra la lista de pagos que se han realizado para el vehículo <?php echo $marca . " " .$modelo ; ?> con placa <b> <?php echo $placa;?> </b> </p>
			</div>
			<table cellpadding="0" cellspacing="0" border="0" class="table-boot table-boottable table-striped table-bordered">
			<thead>
					<tr class="odd gradeX">
						<th>fecha de corte </th>
						<th>Fecha en que se Pago  </th>
						<th>Codigo de factura </th>
						<th>Valor a</th>
					</tr>
			</thead>
			<?php
				foreach( $factura as $factura )
				{
					echo "<tr class='odd gradeX'>
							<td>".$factura['fechaCorte']."</td>
							<td>".$factura['fechaPago']."</td>
							<td>".$factura['codigo']."</td>
							<td>".$factura['valor']."</td>
						</tr>";
				}
			?>
			</table>
		<?php else : ?>
			<div class="alert alert-info">
			   El usuario no registra ninguna factura para el vehículo <?php echo $marca . " " .$modelo ; ?> con placa <b> <?php echo $placa;?> </b>
		  </div>
		<?php endif; ?>

	</div>
	</body>
</html>
