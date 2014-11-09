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

		<div id="menu-bar">
			<nav class="navbar navbar-default" role="navigation">
			<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse"
			            data-target=".navbar-ex1-collapse">
			      <span class="sr-only">Desplegar navegación</span>
			      <span class="icon-bar"></span>
			      <span class="icon-bar"></span>
			      <span class="icon-bar"></span>
			    </button>

			</div>
		  	<div class="container-fluid">
		    <!-- Brand and toggle get grouped for better mobile display -->


		    <!-- Collect the nav links, forms, and other content for toggling -->
		    <div class="collapse navbar-collapse navbar-ex1-collapse" id="bs-example-navbar-collapse-1">
		      <ul class="nav navbar-nav">
		        <li class="dropdown">
		          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Consultas Web <span class="caret"></span></a>
		          <ul class="dropdown-menu" role="menu">
		            <li><a href="<?php echo base_url('index.php/consultasWeb/historialPeajes'); ?>">Historial de Peajes Cruzados</a></li>
		            <li><a href="<?php echo base_url('index.php/consultasWeb/historialPeajesFecha'); ?>">Historial de Peajes cruzados por fecha</a></li>
		            <li><a href="<?php echo base_url('index.php/consultasWeb/historialPagos'); ?>">Historial de pagos</a></li>
		            <li class="divider"></li>
		            <li><a href="<?php echo base_url('index.php/consultasWeb/ultimoPeaje'); ?>">Último peaje cruzado</a></li>
		            <li><a href="<?php echo base_url('index.php/consultasWeb/valorUltimoMes'); ?>">Último valor a pagar</a></li>
		          </ul>
		        </li>
		      </ul>

		      <ul class="nav navbar-nav navbar-right">

		        <li class="dropdown">
		          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
		          Cristian Chaparro
		          <span class="glyphicon glyphicon-cog
		          "></span><span class="caret"></span></a>
		          <ul class="dropdown-menu" role="menu">
		            <li><a href="<?php echo base_url('index.php/consultasWeb/actualizarDatos'); ?>">Actualizar Datos</a></li>
		            <li class="divider"></li>
		            <li><a href="#">Salir</a></li>
		          </ul>
		        </li>
		      </ul>
		    </div><!-- /.navbar-collapse -->
		  </div><!-- /.container-fluid -->
			</nav>
		</div><!-- End menu-bar -->
	</div><!-- End menu -->
<!--
</div>
Esta en la vista body
-->


			<script type="text/javascript">
				$(function() {
					myMenu = new dhtmlXMenuObject({
					parent: 'menu-bar',
					icons_path: '<?php echo base_url()?>images/icons/',
					json: '<?php echo $menu;?>'
					});

					myMenu.attachEvent("onClick", function(id, zoneId, cas) {
						window.location = '<?php echo base_url()?>' + id;
					});
				});
			</script>

