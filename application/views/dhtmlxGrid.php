			<div id="gridbox"></div>
			<script type="text/javascript">
				mygrid = new dhtmlXGridObject('gridbox');
				mygrid.setImagePath('../third_party/dhtmlx/codebase/imgs/');
				mygrid.setHeader('<?php echo $header?>');
				mygrid.setSkin("dhx_terrace");
				mygrid.init();
				mygrid.load("./data");
			</script>
