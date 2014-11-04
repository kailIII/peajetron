			<div id="botones">
				<input type="button" value="Nuevo" onclick="var id = (new Date()).valueOf(); myGrid.addRow(id, '');" />
				<input type="button" value="Eliminar" onclick="myGrid.deleteSelectedRows();" />
				<input type="button" value=" PDF " onclick="myGrid.toPDF('<?php echo base_url()?>application/third_party/dhtmlx/codebase/grid-pdf-php/generate.php');" />
				<input type="button" value="Excel" onclick="myGrid.toExcel('<?php echo base_url()?>application/third_party/dhtmlx/codebase/grid-excel-php/generate.php');" />
			</div>
			<div id="dhtmlx"></div>
			<script type="text/javascript">
				myGrid = new dhtmlXGridObject('dhtmlx');
				myGrid.setImagePath('../third_party/dhtmlx/codebase/imgs/');
				myGrid.setHeader('Tipo Documento');
				myGrid.attachHeader("#select_filter");
				myGrid.setColTypes('edtxt');
				myGrid.setColSorting('str');
				myGrid.setColValidators('NotEmpty');
				myGrid.setSkin('dhx_terrace');
				myGrid.enableAutoHeight(true);
				myGrid.enableAutoWidth(true);
				myGrid.enableColumnAutoSize(true);
				myGrid.init();
				myGrid.load('documento/datos');

				var dp = new dataProcessor("documento/datos");
				dp.action_param = "dhx_editor_status";
				dp.init(myGrid);
			</script>
