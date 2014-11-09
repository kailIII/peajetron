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
				myGrid.setHeader('Perfil,Controlador');
				myGrid.attachHeader("#select_filter,#text_filter");
				myGrid.setColTypes('edtxt,edtxt');
				myGrid.setColSorting('str,str');
				myGrid.setColValidators('NotEmpty,NotEmpty');
				myGrid.setSkin('dhx_terrace');
				myGrid.enableAutoHeight(true);
				myGrid.enableAutoWidth(true);
				myGrid.enableColumnAutoSize(true);
				myGrid.init();
				myGrid.load('perfil/datos');

				var dp = new dataProcessor("perfil/datos");
				dp.action_param = "dhx_editor_status";
				dp.init(myGrid);
			</script>
