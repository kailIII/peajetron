			<div id="botones">
				<input type="button" value=" PDF " onclick="myGrid.toPDF('<?php echo base_url()?>application/third_party/dhtmlx/codebase/grid-pdf-php/generate.php');">
				<input type="button" value="Excel" onclick="myGrid.toExcel('<?php echo base_url()?>application/third_party/dhtmlx/codebase/grid-excel-php/generate.php');">
			</div>
			<div id="dhtmlx"></div>
			<script type="text/javascript">
				myGrid = new dhtmlXGridObject('dhtmlx');
				myGrid.setImagePath('../third_party/dhtmlx/codebase/imgs/');
				myGrid.setHeader('Estado,Categoria,Placa,Marca,Color,Modelo,Fecha registro');
				myGrid.attachHeader("#select_filter,#select_filter,#text_search,#text_search,#text_search,#numeric_filter,&nbsp;");
				myGrid.setColTypes('ro,ro,ro,edtxt,edtxt,edn,ro');
				myGrid.setColSorting('str,str,srt,str,str,int,date');
				myGrid.setColValidators(',,,,,ValidInteger,');
				myGrid.setSkin('dhx_terrace');
				myGrid.enableAutoHeight(true);
				myGrid.enableAutoWidth(true);
				myGrid.enableColumnAutoSize(true);
				myGrid.init();
				myGrid.load('./datos2');
				myGrid.setDateFormat("%Y-%m-%d %H:%i:%s");

				var dp = new dataProcessor("./datos2");
				dp.action_param = "dhx_editor_status";
				dp.init(myGrid);
			</script>
