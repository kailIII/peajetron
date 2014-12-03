			
			<!-- bootbox code -->
		    <script src="https://github.com/makeusabrew/bootbox/releases/download/v4.3.0/bootbox.min.js"></script>
		    <script>
		    	function ayudaF(){	       
		        	bootbox.alert("¿Cómo leer un código QR?\n El sistema genera una opción para dar permisos al uso de la cámara y micrófono del equipo.  Usted debe dar clic en permitir, en caso de que no aparezca el mensaje, asegúrese de que el navegador le dé permiso de acceso a la cámara para la página. Luego de dar permisos aparecerá la interfaz de la cámara para que usted lea su código QR poniéndolo frente al dispositivo. En caso de que la lectura falle  aparecerá el mensaje “Formato de vcard incorrecto”. Luego podrá intentar nuevamente dando clic en Registrar QR o seleccionando la opción Registrar Placa, para tomarle foto a  la placa. En caso de seleccionar la segunda opción puede acceder al botón de ayuda para saber el procedimiento que debe seguir en ese caso.");
		    	}
		    </script>
			
		

			<div id="botones">
				<input type="button" value="Registrar QR" onclick="$('#cruceForm').submit();">
				<input type="button" value="Registrar Placa" onclick="window.location='http://104.131.178.140/peajetron/index.php/fotografia/tomarFoto'">
				<button onclick="ayudaF()">
					<img src="http://www.iconarchive.com/download/i31936/thiago-silva/palm/Help.ico" alt="Help" height="42" width="42" id="ayuda">
				</button>
			</div>
			<div id="dhtmlx">
				<table>
					<tbody>
						<tr>
							<td><div id="lectura" style="width: 300px; height: 300px;"></div></td>
							<td>
								
<?php
echo validation_errors();
echo $mensaje;
echo form_open('cobro/registrarQR', array('id' => 'cruceForm'));
echo form_label('Vcard:', 'vcard');
echo form_textarea(array('id' => 'vcard', 'name' => 'vcard'));
echo form_hidden('id_usuario', $id_usuario);
echo form_hidden('id_peaje', $id_peaje);
echo form_close();
?>

							</td>
						</tr>
					</tbody>
				</table>
			</div>
			<script type="text/javascript">
				$("#vcard").change(function(event) {
		        $("#cruceForm").submit();
				});

				$('#lectura').html5_qrcode(
					function(data){
						$('#vcard').val(data);
					},
					function(error){
						console.log(error);
					},
					function(videoError){
						console.log(videoError);
					}
				);
			</script>
