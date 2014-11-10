<body>
<div class="container">



	
	<div class="menu">
		 	<div id="menu-top">
				<div id="menu-imagenes">
					<img src="http://www.invias.gov.co/templates/new_vision/images/s5_logo.png" alt="Logo INVIAS">
					<img src="http://www.invias.gov.co/images/logoProsperidad.png" alt="Logo INVIAS">
				</div>
				<div id="menu-informacion">

					<p class="Timer"></p>
				</div>
			</div>
			

   			<nav class="navbar navbar-default" role="navigation">
				  <div class="container-fluid">
				    <!-- Brand and toggle get grouped for better mobile display -->
				    <div class="navbar-header">
				      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
				        <span class="sr-only">Toggle navigation</span>
				        <span class="icon-bar"></span>
				        <span class="icon-bar"></span>
				        <span class="icon-bar"></span>
				      </button>
				     <div id="menuObj"></div>
				    </div>

				    <!-- Collect the nav links, forms, and other content for toggling -->
				    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					  
				      <ul class="nav navbar-nav navbar-right">
				        
				        <li class="dropdown">
				          <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <?php echo $usuario; ?> <span class="caret"></span></a>
				          <ul class="dropdown-menu" role="menu">
				            <li><a href='<?php echo base_url()?>index.php/inicio/salir'>Salir</a></li>
				          </ul>
				        </li>
				      </ul>
				    </div><!-- /.navbar-collapse -->
				  </div><!-- /.container-fluid -->
				</nav>

	</div><!-- End menu -->
<!--
</div>
Esta en la vista body
-->

 <div class="css-js">
 		<?php echo link_tag(base_url().'application/third_party/dhtmlx/skins/terrace/dhtmlx.css'); ?>
 		<script type="text/javascript" src="<?php echo base_url().'application/third_party/dhtmlx/codebase/dhtmlx.js'?>"></script>
 		<script type="text/javascript" src="<?php echo base_url().'application/third_party/dhtmlx/sources/dhtmlxGrid/codebase/ext/dhtmlxgrid_export.js'?>"></script>
		<script type="text/javascript">
			var myMenu, myGrid, myCombo;
		</script>
		<script type="text/javascript">
				$(function() {
					myMenu = new dhtmlXMenuObject({
					parent: 'menuObj',
					icons_path: '<?php echo base_url()?>images/icons/',
					json: '<?php echo $menu;?>'
					});

					myMenu.attachEvent("onClick", function(id, zoneId, cas) {
						window.location = '<?php echo base_url()?>' + id;
					});
				});
		</script>
	

</div>