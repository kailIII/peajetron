			<div class="login">
<?php
echo form_open('cobro/capturar/true');
echo form_label('Peaje:', 'peaje');
echo form_dropdown('id_peaje', $peaje, null, 'id="peaje"');
echo form_submit('selecciona', 'Seleccionar');
echo form_close();
?>

			</div>
