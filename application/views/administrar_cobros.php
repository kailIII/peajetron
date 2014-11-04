			<div id="botones">
				<input type="button" value=" PDF " onclick="myGrid.toPDF('<?php echo base_url()?>application/third_party/dhtmlx/codebase/grid-pdf-php/generate.php');">
				<input type="button" value="Excel" onclick="myGrid.toExcel('<?php echo base_url()?>application/third_party/dhtmlx/codebase/grid-excel-php/generate.php');">
			</div>
			<div id="dhtmlx"></div>
			<script type="text/javascript">
				myGrid = new dhtmlXGridObject('dhtmlx');
				myGrid.setImagePath('../third_party/dhtmlx/codebase/imgs/');
				myGrid.setHeader('Vehículo,Propietario,Registrado,Peaje,Valor,Fecha registro,Fecha pago');
				myGrid.attachHeader("#text_search,#text_search,#select_filter,#select_filter,#numeric_filter,&nbsp;,&nbsp;");
				myGrid.setColTypes('ro,ro,ro,ro,ro,ro,ro');
				myGrid.setColSorting('str,str,str,str,int,date,date');
				myGrid.setSkin('dhx_terrace');
				myGrid.enableAutoHeight(true);
				myGrid.enableAutoWidth(true);
				myGrid.enableColumnAutoSize(true);
				myGrid.init();
				myGrid.load('./datos');
				myGrid.setDateFormat("%Y-%m-%d %H:%i:%s");

				var dp = new dataProcessor("./datos");
				dp.action_param = "dhx_editor_status";
				dp.init(myGrid);
			</script>
