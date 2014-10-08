			<div class="login">
<?php
echo form_open('cobro/capturar');
echo form_label('Peaje:', 'peaje');
echo form_dropdown('id_peaje', $peaje);
echo form_submit('selecciona', 'Seleccionar');
echo form_close();
?>

			</div>
