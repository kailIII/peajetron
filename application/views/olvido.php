
<div class="login">
	<?php
		echo validation_errors();
		echo form_open('login/recuperar');
		echo form_label('Correo:', 'correo');
		echo form_input(array('id'=>'correo', 'name'=>'correo', 'placeholder' => 'Correo electrónico'));
	?>
<div id="lower">
	<?php
		echo form_submit('busca', 'Buscar');
		echo form_submit('volver', 'Cancelar');
	?>
</div>
<?php
	echo form_close();
?>

</div>
