			<div id="contenido">
<?php
echo validation_errors();
echo form_open('usuario/actualizar', array('id' => 'actualizar'));
echo form_label('Tipo de documento:', 'documento');
echo form_dropdown('id_tipo_documento', $sdocumento, null, 'id="documento"');
echo br();
echo form_label('Ubicación:', 'ubicacion');
echo form_dropdown('id_ubicacion', $ubicacion, null, 'id="ubicacion"');
echo br();
echo form_label('Documento:', 'documento');
echo form_input(array('id' => 'documento', 'name' => 'documento', 'value' => $documento));
echo br();
echo form_label('Nombre:', 'nombre');
echo form_input(array('id' => 'nombre', 'name' => 'nombre', 'value' => $nombre));
echo br();
echo form_label('Correo:', 'correo');
echo form_input(array('id' => 'correo', 'name' => 'correo', 'value' => $correo));
echo br();
echo form_label('Teléfono:', 'telefono');
echo form_input(array('id' => 'telefono', 'name' => 'telefono', 'value' => $telefono));
echo br();
echo form_label('Dirección:', 'direccion');
echo form_input(array('id' => 'direccion', 'name' => 'direccion', 'value' => $direccion));
echo br();
echo form_label('Contraseña:', 'contrasena');
echo form_password('contrasena');
echo br();
echo form_label('Repita Contraseña:', 'contrasena2');
echo form_password('contrasena2');
echo br();
echo form_submit('envia', 'Actualizar');
echo form_close();
?>

			</div>
