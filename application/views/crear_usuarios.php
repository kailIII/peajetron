			<div id="contenido">
<?php
echo validation_errors();
echo form_open('usuario/registrar', array('id' => 'registrar'));
echo form_label('Perfil:', 'perfil');
echo form_dropdown('id_perfil', $perfil, null, 'id="perfil"');
echo br();
echo form_label('Tipo de documento:', 'documento');
echo form_dropdown('id_tipo_documento', $documento, null, 'id="documento"');
echo br();
echo form_label('Ubicación:', 'ubicacion');
echo form_dropdown('id_ubicacion', $ubicacion, null, 'id="ubicacion"');
echo br();
echo form_label('Documento:', 'documento');
echo form_input(array('id' => 'documento', 'name' => 'documento', 'value' => set_value('documento')));
echo br();
echo form_label('Nombre:', 'nombre');
echo form_input(array('id' => 'nombre', 'name' => 'nombre', 'value' => set_value('nombre')));
echo br();
echo form_label('Correo:', 'correo');
echo form_input(array('id' => 'correo', 'name' => 'correo', 'value' => set_value('correo')));
echo br();
echo form_label('Teléfono:', 'telefono');
echo form_input(array('id' => 'telefono', 'name' => 'telefono', 'value' => set_value('telefono')));
echo br();
echo form_label('Dirección:', 'direccion');
echo form_input(array('id' => 'direccion', 'name' => 'direccion', 'value' => set_value('direccion')));
echo br();
echo form_submit('envia', 'Registrar');
echo form_close();
?>

			</div>
