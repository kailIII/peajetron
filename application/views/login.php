			<div class="login">
<?php
echo validation_errors();
echo form_open('verifylogin');
echo form_label('Usuario:', 'usuario');
echo form_input(array('id'=>'usuario', 'name'=>'usuario', 'placeholder' => 'Correo electrónico'));
echo form_label('Contraseña:', 'contrasena');
echo form_password(array('id'=>'contrasena', 'name'=>'contrasena', 'placeholder' => 'Contraseña'));
?>
<p>
<?php
echo anchor('#', 'Olvidaste tu contraseña?');
?>
</p>
<div id="lower">
<?php
echo form_checkbox(array('id' => 'logeado', 'name' => 'logeado', 'value' => 'Si'));
echo form_label('Recordar mis datos', 'logeado');
echo form_submit('inicia', 'Iniciar Sesión');
?>
</div>
<?php
echo form_close();
?>

			</div>
