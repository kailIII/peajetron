			<div id="contenido">
<?php
echo validation_errors();
$attributes = array('id' => 'cruceForm');
echo form_open('cobro/registrarPlaca',  $attributes);
echo form_label('Placa:', 'placa');
echo form_input(array('id' => 'placa', 'name' => 'placa'));
echo br();
echo form_label('Usuario:', 'id_usuario');
echo form_input(array('id' => 'id_usuario', 'name' => 'id_usuario', 'value' => $id_usuario));
echo br();
echo form_label('Peaje:', 'id_peaje');
echo form_input(array('id' => 'id_peaje', 'name' => 'id_peaje', 'value' => $id_peaje));
echo br();
echo form_submit('envia', 'Registrar Placa');
//echo br();
//echo form_button('volvar', 'Volver', 'onClick="javascript:window.location=\'capturar/volver\'"');
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
