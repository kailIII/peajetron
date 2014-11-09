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
				myGrid.setHeader('Menu,Nombre,Dirección,icono,orden');
				myGrid.attachHeader("#select_filter,#text_filter,&nbsp;,&nbsp;,#numeric_filter");
				myGrid.setColTypes('combo,edtxt,edtxt,edtxt,edn');
				myGrid.setColSorting('str,str,str,str,int');
				myGrid.setColValidators('NotEmpty,NotEmpty,NotEmpy,NotEmpy,ValidInteger');
				myGrid.setSkin('dhx_terrace');
				myGrid.enableAutoHeight(true);
				myGrid.enableAutoWidth(true);
				myGrid.enableColumnAutoSize(true);
				myGrid.init();
				myGrid.load('menus/datos');

				var dp = new dataProcessor("menus/datos");
				dp.action_param = "dhx_editor_status";
				dp.init(myGrid);

				myCombo = myGrid.getColumnCombo(0);
				myCombo.load('<?php echo $menu?>');
			</script>
