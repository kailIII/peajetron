<html>
	<head>
		<meta charset="utf-8">
		
		<link href="<?php echo base_url('assets/css/bootstrap.css');?>" rel="stylesheet" type="text/css">
		<link href="<?php echo base_url('assets/css/menu.css');?>" rel="stylesheet" type="text/css">
		<link href="//cdn.datatables.net/plug-ins/a5734b29083/integration/bootstrap/3/dataTables.bootstrap.css" rel="stylesheet" type="text/css">
		<script asyn type="text/javascript" src="<?php echo base_url('assets/js/jquery-2.1.1.min.js');?>"></script>
		<script asyn type="text/javascript" src="<?php echo base_url('assets/js/bootstrap.js');?>"></script>
		<script asyn type="text/javascript" src="<?php echo base_url('assets/js/fecha.js');?>"></script>

		<script type="text/javascript" language="javascript" src="//cdn.datatables.net/1.10-dev/js/jquery.dataTables.min.js"></script>
		<script asyn type="text/javascript" src="//cdn.datatables.net/plug-ins/a5734b29083/integration/bootstrap/3/dataTables.bootstrap.js"></script>

		<script type="text/javascript" charset="utf-8">
			$(document).ready(function() {
				$('.table-boot').dataTable();
			} );
		</script>
		
	</head>
	<body>
	<div class="container">
		<h2>Lista de peajes cruzados </h2>


		<?php if ( $status ) : ?>
			<table cellpadding="0" cellspacing="0" border="0" class="table-boot table-boottable table-striped table-bordered">
			<thead>
			    <tr class="odd gradeX">
			      <th>Peaje </th>
			      <th>Ruta </th>
			      <th>Fecha de cruce</th>
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
							<td>".$peaje['valor']."</td> 
						</tr>";	
				} 
			?>
			</table>
		<?php else : ?>
			El usuario no presenta ningún registro  de cruce por peaje del vehículo seleccionado
		<?php endif; ?>
	<div>
	</body>
</html>