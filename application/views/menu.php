			<script type="text/javascript">
				var myMenu;

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
