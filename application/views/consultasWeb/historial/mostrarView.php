<html>
	<head>
		<meta charset="utf-8">
		
		<link href="<?php echo base_url('assets/css/bootstrap.css');?>" rel="stylesheet" type="text/css">
		<script asyn type="text/javascript" src="<?php echo base_url('assets/js/jquery-2.1.1.min.js');?>"></script>
		<script asyn type="text/javascript" src="<?php echo base_url('assets/js/bootstrap.js');?>"></script>
		<script asyn type="text/javascript" src="<?php echo base_url('assets/js/fecha.js');?>"></script>
		
	</head>
	<body>
		<h2>Lista de peajes cruzados <?php echo $placa?> </h2>
		<table>
		<?php
			foreach( $peajes as $peaje )
			{
				echo "<tr><td>".$peaje['peaje']."</td> <td>".$peaje['ruta']."</td> </tr>";	
			} 
		?>
		</table>
	</body>
</html>