			<div id="botones">
				<input type="button" value="Volver" onclick="window.location='capturar/false'">
				<input type="button" value="Registrar Placa" onclick="$('#cruceForm').submit();">
			</div>
			<div id="dhtmlx">
<?php
echo validation_errors();
echo form_open('cobro/registrarPlaca', array('id' => 'cruceForm'));
echo form_label('Placa:', 'placa');
echo form_input(array('id' => 'placa', 'name' => 'placa'));
echo form_hidden('id_usuario', $id_usuario);
echo form_hidden('id_peaje', $id_peaje);
echo form_close();
?>

			</div>
			<script type="text/javascript">
				$("#placa").keyup(function(event) {
					if(event.which == 13) {
		        $("#cruceForm").submit();
			    }
				});
			</script>
