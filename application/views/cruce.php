<!-- Import de la libreria HTML5-QRCode -->
<script src="js/html5-qrcode.min.js"></script>



<!-- Submit del form #cruceForm cuando cambia el texto del text_area #vcard -->
<script type="text/javascript">
	$("#vcard").change(function(event) {
    $("#cruceForm").submit();
	});
</script>


<h3>Lectura códigos QR</h3>
<p>A continuación encontrará un prototipo del módulo de lectura de códigos QR
	para el paso de peajes del proyecto "Movilidad Inteligente"</p>


<div id="contenido" style="float: right;">
	<?php
	echo validation_errors();
	echo $mensaje;
	echo form_open('cobro/registrarQR', array('id' => 'cruceForm'));
	echo form_label('Vcard:', 'vcard');
	echo form_textarea(array('id' => 'vcard', 'name' => 'vcard', 'cols' => 70, 'rows' => 5, 'value' => "BEGIN:VCARD\nVERSION:4.0\nN:AAA111\nNOTE:46793D66609EFA224DADA69EBBAB331CBF6B3E588618B7858318429FB8FEE6E1\nREV:20140901T222710Z\nEND:VCARD"));
	echo br();
	echo form_label('Usuario:', 'id_usuario');
	echo form_input(array('id' => 'id_usuario', 'name' => 'id_usuario', 'value' => $id_usuario));
	echo br();
	echo form_label('Peaje:', 'id_peaje');
	echo form_input(array('id' => 'id_peaje', 'name' => 'id_peaje', 'value' => $id_peaje));
	echo br();
	echo form_submit('envia', 'Registrar QR');
	echo br();
	echo form_button('placa', 'Registrar Placa', 'onClick="javascript:window.location=\'placa\'"');
	echo form_close();
	?>
</div>

<div id="lectura" style="float: left; width:600px; height:430px;">

	<!-- Actualización del text area vcard con los datos de la lectura del código QR -->
	<script>
        $('#lectura').html5_qrcode(function(data){
        	/**
			 * Captura el código QR leido por la camara en forma de string.
			 * @param {string} [data] Contiene el String del código qr.
			 */
        	$('#vcard').text(data);
       	},
       	function(error){
      		/**
			 * Envia a la consola de logs un mensaje con el error
			 * pertinente en caso de que haya errores de lectura
			 * del código qr.
			 * @param {string} [error] Contiene el mensaje de error
			 * de lectura.
			 */
			 console.log(error);
      	}, function(videoError){
      		/**
			 * Envia a la consola de logs un mensaje con el error
			 * pertinente en caso de que haya problemas abriendo
			 * el stream del video.
			 * @param {string} [videoError] Contiene el mensaje de error.
			 */
			 console.log(videoError);
      	}
        );
    </script>



</div>








