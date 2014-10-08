			<div id="contenido">
<?php
echo validation_errors();
echo $mensaje;
$attributes = array('id' => 'cruceForm');
echo form_open('cobro/registrar',  $attributes);
echo form_label('Vcard:', 'vcard');
echo form_textarea(array('id' => 'vcard', 'name' => 'vcard', 'cols' => 70, 'rows' => 5, 'value' => "BEGIN:VCARD\nVERSION:4.0\nN:AAA111\nNOTE:46793D66609EFA224DADA69EBBAB331CBF6B3E588618B7858318429FB8FEE6E1\nREV:20140901T222710Z\nEND:VCARD"));
echo br();
echo form_label('Usuario:', 'id_usuario');
echo form_input(array('id' => 'id_usuario', 'name' => 'id_usuario', 'value' => $id_usuario));
echo br();
echo form_label('Peaje:', 'id_peaje');
echo form_input(array('id' => 'id_peaje', 'name' => 'id_peaje', 'value' => $id_peaje));
echo br();
echo form_submit('envia', 'Registrar');
echo form_close();
?>

			</div>
			<script type="text/javascript">
				$("#vcard").keyup(function(event) {
					if(event.which == 13) {
		        $("#cruceForm").submit();
			    }
				});
			</script>
