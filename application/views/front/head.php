<!DOCTYPE html>
<html>
	<head>
		<title>.:: Peajetron ::.</title>
		<?php
		$meta = array(array('name' => 'Content-type', 'content' => 'text/html; charset=utf-8', 'type' => 'equiv'),array('name' => 'language', 'content' => 'es'));
	 	echo meta($meta);
		echo link_tag('http://udistrital.edu.co/imagenes/favicon.ico', 'shortcut icon', 'image/ico');
	 	echo link_tag(base_url().'css/peajetron.css');
	 	echo link_tag(base_url().'application/third_party/dhtmlx/skins/terrace/dhtmlx.css');
		?>
		<script type="text/javascript" src="<?php echo base_url().'application/third_party/dhtmlx/codebase/dhtmlx.js'?>"></script>
		<script type="text/javascript" src="<?php echo base_url().'application/third_party/jquery/jquery-min.js'?>"></script>
	</head>
	<body>