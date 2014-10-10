<html>
	<head>
		<meta charset="utf-8">
		<link href="<?php echo base_url('assets/css/bootstrap.css');?>" rel="stylesheet" type="text/css">
		<script asyn type="text/javascript" src="<?php echo base_url('assets/js/jquery-2.1.1.min.js');?>"></script>
		<script asyn type="text/javascript" src="<?php echo base_url('assets/js/bootstrap.js');?>"></script>
		<script asyn type="text/javascript" src="<?php echo base_url('assets/js/fecha.js');?>"></script>
	</head>
	
	<body>
		<h2>Historial de pagos  </h2>
		<table>
		<?php
			foreach( $pagos as $pago )
			{
				echo "<tr>
						<td>".$pago['fechaCorte']."</td> 
						<td>".$pago['fechaPago']. "</td> 
						<td>".$pago['codigo']. "</td> 
						<td>".$pago['valor']. "</td> 
				</tr>";	
			} 
		?>
		</table>
	</body>
</html>