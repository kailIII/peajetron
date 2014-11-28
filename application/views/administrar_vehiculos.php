			<div id="botones">
				<input type="button" value="Nuevo" onclick="var id = (new Date()).valueOf(); myGrid.addRow(id, '');" />
				<input type="button" value=" PDF " onclick="myGrid.toPDF('<?php echo base_url()?>application/third_party/dhtmlx/codebase/grid-pdf-php/generate.php');">
				<input type="button" value="Excel" onclick="myGrid.toExcel('<?php echo base_url()?>application/third_party/dhtmlx/codebase/grid-excel-php/generate.php');">
			</div>
			<div id="dhtmlx"></div>
			<script type="text/javascript">
				myGrid = new dhtmlXGridObject('dhtmlx');
				myGrid.setImagePath('../third_party/dhtmlx/codebase/imgs/');
				myGrid.setHeader('QR,Usuario,Estado,Categoria,Placa,Marca,Color,Modelo,Fecha registro,Fecha modificacion');
				myGrid.attachHeader("&nbsp;,#select_filter,#select_filter,#select_filter,#text_search,#text_search,#text_search,#numeric_filter,&nbsp;,&nbsp;");
				myGrid.setColTypes('img,combo,combo,combo,edtxt,edtxt,edtxt,edn,dhxCalendar,dhxCalendar');
				myGrid.setColSorting(',str,str,str,srt,str,str,int,date,date');
				myGrid.setColValidators(',NotEmpty,NotEmpty,NotEmpty,NotEmpty,,,,NotEmpty,NotEmpty');
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

				myCombo = myGrid.getColumnCombo(1);
				myCombo.load('<?php echo $usuarios?>');

				myCombo = myGrid.getColumnCombo(2);
				myCombo.load('<?php echo $estados?>');

				myCombo = myGrid.getColumnCombo(3);
				myCombo.load('<?php echo $categorias?>');

				function mostrar(placa)
				{
					myWins = new dhtmlXWindows();
					myWins.createWindow({
						id: 'w1',
						width: 280,
						height: 300,
						center: true,
						modal: true
					});
					myWins.window('w1').attachHTMLString('<img src="/peajetron/qr.php?placa=' + placa + '" alt="QR" />');
				}
			</script>
