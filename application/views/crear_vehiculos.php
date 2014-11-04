			<div id="contenido">
<?php
echo validation_errors();
echo form_open('vehiculo/registrar', array('id' => 'registrar'));
echo form_label('Usuario:', 'usuario');
echo form_dropdown('id_usuario', $usuario, null, 'id="usuario"');
echo br();
echo form_label('Categoria:', 'categoria');
echo form_dropdown('id_categoria', $categoria, null, 'id="categoria"');
echo br();
echo form_label('Placa:', 'placa');
echo form_input(array('id' => 'placa', 'name' => 'placa', 'value' => set_value('placa')));
echo br();
echo form_label('Marca:', 'marca');
echo form_input(array('id' => 'marca', 'name' => 'marca', 'value' => set_value('marca')));
echo br();
echo form_label('Color:', 'color');
echo form_input(array('id' => 'color', 'name' => 'color', 'value' => set_value('color')));
echo br();
echo form_label('Modelo:', 'modelo');
echo form_input(array('id' => 'modelo', 'name' => 'modelo', 'value' => set_value('modelo')));
echo br();
echo form_submit('envia', 'Registrar');
echo form_close();
?>

			</div>
