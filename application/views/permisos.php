			<div id="dhtmlx">&nbsp;</div>
			<script type="text/javascript">
				function doOnCheck(rowId, cellInd, state) {
					$.post('guardar', {id_perfil: rowId, columna: cellInd, estado: state}, function(data) {
						if(data.success)
							alert('Guardado correcto');
					}, 'json');
				}

				myGrid = new dhtmlXGridObject('dhtmlx');
				myGrid.setImagePath('../../application/third_party/dhtmlx/skins/terrace/imgs/');
				myGrid.setHeader('Perfil,<?php echo trim($head, ',');?>');
				myGrid.setColTypes('ro,<?php echo trim($ColTypes, ',');?>');
				myGrid.setSkin('dhx_terrace');
				myGrid.enableAutoHeight(true);
				myGrid.enableAutoWidth(true);
				myGrid.enableColumnAutoSize(true);
				myGrid.attachEvent('onCheckbox', doOnCheck);
				myGrid.init();
				myGrid.load('datos?columnas=<?php echo $columnas?>', 'json');
			</script>
