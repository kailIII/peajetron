<!DOCTYPE HTML>

<html>
	<head>
		<meta charset="utf-8">
		<link href="<?php echo base_url('assets/css/bootstrap.css');?>" rel="stylesheet" type="text/css">
		<script asyn type="text/javascript" src="<?php echo base_url('assets/js/jquery-2.1.1.min.js');?>"></script>
		<script asyn type="text/javascript" src="<?php echo base_url('assets/js/bootstrap.js');?>"></script>
		<script asyn type="text/javascript" src="<?php echo base_url('assets/js/fecha.js');?>"></script>
	</head>
	<body>
			<h1> Historial de peajes Cruzados  </h1>
		    <div>
				<?php 
					echo form_open( site_url() .'/consultasWeb/historialPeajes/mostrarPeajes');
				?>
				<div>
					<label>Seleccione el automovil</label>
					<select class="selectpicker"  name="placa">
						<?php 
						foreach( $listaAutos as $auto )
						{
						    ?>
						    	<option value="<?=$auto['placa']?>"> <?=$auto['marca']?> - <?=$auto['modelo']?>  </option>
						    <?php
						}
						?>
					</select>
				</div>
				<div id="botones-lista">
					<button class="btn btn-success" type="submit" accesskey="a">Aceptar</button>
					<?php
						//echo form_submit(array('value' => 'Aceptar'));
						echo form_close();
					?>
				</div>	
			</div>
	</body>
</html>


