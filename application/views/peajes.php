			<div id="botones">
				<input type="button" value="Nuevo" onclick="var id = (new Date()).valueOf(); myGrid.addRow(id, '1,Nombre,0,0');" />
				<input type="button" value="Eliminar" onclick="myGrid.deleteSelectedRows();" />
				<input type="button" value=" PDF " onclick="myGrid.toPDF('<?php echo base_url()?>application/third_party/dhtmlx/codebase/grid-pdf-php/generate.php');" />
				<input type="button" value="Excel" onclick="myGrid.toExcel('<?php echo base_url()?>application/third_party/dhtmlx/codebase/grid-excel-php/generate.php');" />
			</div>
			<div id="recinfoArea">&nbsp;</div>
			<div id="dhtmlx"></div>
			<div id="pagingArea">&nbsp;</div>
			<script type="text/javascript">
				var error = true;
				myGrid = new dhtmlXGridObject('dhtmlx');
				myGrid.setImagePath('../third_party/dhtmlx/codebase/imgs/');
				myGrid.setHeader('Ruta,Nombre,Latitud,Longitud');
				myGrid.attachHeader("#select_filter,#text_filter,#numeric_filter,#numeric_filter");
				myGrid.setColTypes('combo,edtxt,edn,edn');
				myGrid.setColSorting('str,str,int,int');
				myGrid.setColValidators('NotEmpty,NotEmpty,ValidNumeric,ValidNumeric');
				myGrid.setSkin('dhx_terrace');
				myGrid.enableAutoHeight(true);
				myGrid.enableAutoWidth(true);
				myGrid.enableColumnAutoSize(true);
				myGrid.enablePaging(true, 30, 3, 'pagingArea', true, 'recinfoArea');
				myGrid.attachEvent('onValidationError', function(id, ind, value, rule) {
					switch(rule)
					{
						case 'NotEmpty':
							alert('Error: Columna vacia.');
						break;

						case 'ValidNumeric':
							alert('Error: "' + value + '" no es un numero.');
						break;
					}
					error = false;
				});
				myGrid.attachEvent('onValidationCorrect', function() {
					error = true;
				});

				myGrid.init();
				myGrid.load('peaje/datos');

				var dp = new dataProcessor('peaje/datos');
				dp.action_param = 'dhx_editor_status';
				dp.attachEvent('onBeforeUpdate', function(id, details) {
					return error;
				});
				dp.init(myGrid);

				myCombo = myGrid.getColumnCombo(0);
				myCombo.load('<?php echo $ruta?>');
			</script>
