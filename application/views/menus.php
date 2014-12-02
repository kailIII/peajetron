			<div id="botones">
				<input type="button" value="Nuevo" onclick="var id = (new Date()).valueOf(); myGrid.addRow(id, '1,Nombre,url,icono,0');" />
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
				myGrid.setHeader('Menu,Nombre,Dirección,icono,orden');
				myGrid.attachHeader("#select_filter,#text_filter,&nbsp;,&nbsp;,#numeric_filter");
				myGrid.setColTypes('combo,edtxt,edtxt,edtxt,edn');
				myGrid.setColSorting('str,str,str,str,int');
				myGrid.setColValidators('NotEmpty,NotEmpty,NotEmpty,NotEmpty,ValidInteger');
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

						case 'ValidInteger':
							alert('Error: "' + value + '" no es un entero.');
						break;
					}
					error = false;
				});
				myGrid.attachEvent('onValidationCorrect', function() {
					error = true;
				});
				myGrid.init();
				myGrid.load('menus/datos');

				var dp = new dataProcessor("menus/datos");
				dp.action_param = "dhx_editor_status";
				dp.attachEvent("onBeforeUpdate", function(id, details) {
					return error;
				});
				dp.init(myGrid);

				myCombo = myGrid.getColumnCombo(0);
				myCombo.load('<?php echo $menu?>');
			</script>
