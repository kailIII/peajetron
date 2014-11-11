			<div id="botones">
				<input type="button" value="Registrar QR" onclick="$('#cruceForm').submit();">
				<input type="button" value="Registrar Placa" onclick="window.location='../../fotografia/tomarFoto'">
			</div>
			<div id="dhtmlx">
				<table>
					<tbody>
						<tr>
							<td><div id="lectura"></div></td>
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
