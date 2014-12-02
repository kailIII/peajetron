			<div id="botones">
				<input type="button" value=" PDF " onclick="myGrid.toPDF('<?php echo base_url()?>application/third_party/dhtmlx/codebase/grid-pdf-php/generate.php');">
				<input type="button" value="Excel" onclick="myGrid.toExcel('<?php echo base_url()?>application/third_party/dhtmlx/codebase/grid-excel-php/generate.php');">
			</div>
			<div id="recinfoArea">&nbsp;</div>
			<div id="dhtmlx"></div>
			<div id="pagingArea">&nbsp;</div>
			<script type="text/javascript">
				myGrid = new dhtmlXGridObject('dhtmlx');
				myGrid.setImagePath('../third_party/dhtmlx/codebase/imgs/');
				myGrid.setHeader('Perfil,Tipo documento,Ubicación,Documento,Nombre,Correo,Teléfono,Dirección,Activo,Fecha Registro,Fecha Modificación');
				myGrid.attachHeader("#select_filter,#select_filter,#select_filter,#numeric_filter,#text_search,#text_search,#numeric_filter,#text_search,#select_filter,&nbsp;,&nbsp;");
				myGrid.setColTypes('combo,combo,combo,edn,edtxt,edtxt,edn,edtxt,combo,dhxCalendar,dhxCalendar');
				myGrid.setColSorting('str,str,str,int,str,str,int,str,str,date,date');
				myGrid.setColValidators('NotEmpty,NotEmpty,NotEmpty,ValidInteger,NotEmpty,ValidEmail,ValidInteger,NotEmpty,NotEmpty,ValidDatetime,ValidDatetime');
				myGrid.setSkin('dhx_terrace');
				myGrid.enableAutoHeight(true);
				myGrid.enableAutoWidth(true);
				myGrid.enableColumnAutoSize(true);
				myGrid.enablePaging(true, 30, 3, 'pagingArea', true, 'recinfoArea');
				myGrid.init();
				myGrid.load('./datos');
				myGrid.setDateFormat("%Y-%m-%d %H:%i:%s");

				var dp = new dataProcessor("./datos");
				dp.action_param = "dhx_editor_status";
				dp.init(myGrid);

				myCombo = myGrid.getColumnCombo(0);
				myCombo.load('<?php echo $perfiles?>');

				myCombo = myGrid.getColumnCombo(1);
				myCombo.load('<?php echo $documentos?>');

				myCombo = myGrid.getColumnCombo(2);
				myCombo.load('<?php echo $ubicaciones?>');

				myCombo = myGrid.getColumnCombo(8);
				myCombo.load('{"options":[{"value":"t","text":"Activo"},{"value":"f","text":"Inactivo"}]}');
			</script>
