<?php
$logo_image = array('src' => 'images/logo.png','alt' => 'logo', 'width' => '90', 'height' => '100');
$banner_image = array('src' => 'images/banner.png','alt' => 'banner', 'width' => '616', 'height' => '100');
?>
<!--
		<header id="header">
			<table width="100%">
				<tbody>
					<tr>
						<td><?echo img($logo_image);?></td>
						<td><?=$titulo?></td>
						<td align="right"><?echo img($banner_image);?></td>
					</tr>
				</tbody>
			</table>
		</header>
-->
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
				<?php if($titulo != "Pago de Peajes") {?>
				    <!-- Collect the nav links, forms, and other content for toggling -->
				    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					  
				      <ul class="nav navbar-nav navbar-right">
				        
				        <li class="dropdown">
				          <a href="#" class="dropdown-toggle" data-toggle="dropdown">  usuario <span class="caret"></span></a>
				          <ul class="dropdown-menu" role="menu">
				            <li><a href='<?php echo base_url()?>index.php/inicio/salir'>Salir</a></li>
				          </ul>
				        </li>
				      </ul>
				    </div><!-- /.navbar-collapse -->
				<?php } ?>
				  </div><!-- /.container-fluid -->
					
				</nav>
		</div>

		<aside>
			<!-- <div class="fondo"></div> -->
