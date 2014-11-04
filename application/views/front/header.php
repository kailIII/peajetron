<?php
$logo_image = array('src' => 'images/logo.png','alt' => 'logo', 'width' => '90', 'height' => '100');
$banner_image = array('src' => 'images/banner.png','alt' => 'banner', 'width' => '616', 'height' => '100');
?>
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
		<nav id="menuObj"></nav>
		<aside>
			<div class="fondo"></div>
