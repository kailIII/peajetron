			<div id="botones">
				<input type="button" value="Nuevo" onclick="var id = (new Date()).valueOf(); myGrid.addRow(id, '');" />
				<input type="button" value="Eliminar" onclick="myGrid.deleteSelectedRows();" />
				<input type="button" value=" PDF " onclick="myGrid.toPDF('<?php echo base_url()?>application/third_party/dhtmlx/codebase/grid-pdf-php/generate.php');" />
				<input type="button" value="Excel" onclick="myGrid.toExcel('<?php echo base_url()?>application/third_party/dhtmlx/codebase/grid-excel-php/generate.php');" />
			</div>
			<div id="recinfoArea">&nbsp;</div>
			<div id="dhtmlx"></div>
			<div id="pagingArea">&nbsp;</div>
			<script type="text/javascript">
				myGrid = new dhtmlXGridObject('dhtmlx');
				myGrid.setImagePath('../third_party/dhtmlx/codebase/imgs/');
				myGrid.setHeader('Ubicacion,Nombre');
				myGrid.attachHeader("#select_filter,#text_filter");
				myGrid.setColTypes('combo,edtxt');
				myGrid.setColSorting('str,str');
				myGrid.setColValidators('NotEmpty,NotEmpty');
				myGrid.setSkin('dhx_terrace');
				myGrid.enableAutoHeight(true);
				myGrid.enableAutoWidth(true);
				myGrid.enableColumnAutoSize(true);
				myGrid.enablePaging(true, 30, 3, 'pagingArea', true, 'recinfoArea');
				myGrid.init();
				myGrid.load('ubicacion/datos');

				var dp = new dataProcessor("ubicacion/datos");
				dp.action_param = "dhx_editor_status";
				dp.init(myGrid);

				myCombo = myGrid.getColumnCombo(0);
				myCombo.load('<?php echo $ubicacion?>');
			</script>
