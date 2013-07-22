<?php $this->output->set_header("Content-Type: text/html; charset=utf-8"); ; ?>
<!DOCTYPE html>
<html>
<head>
<?php $this->lang->load($this->config->item('admin_language'), $this->config->item('admin_language')); ?>
<meta charset="utf-8" />
<title><?php echo $this->lang->line('cms_title');?></title>
<!-- main css -->
<link href="<?php echo $this->config->item('admin_assets_path');?>css/default.css" rel="stylesheet" type="text/css" />

<!-- jquery -->
<script src="<?php echo $this->config->item('admin_assets_path');?>js/jquery-1.4.2.min.js"></script>
<script src="<?php echo $this->config->item('admin_assets_path');?>js/jquery-ui-1.8.5.custom.min.js"></script>

<!-- transliterate script -->
<script src="<?php echo $this->config->item('admin_assets_path');?>js/jquery.synctranslit.js"></script>

<!-- fancybox -->
<script src="<?php echo $this->config->item('admin_assets_path');?>js/jquery.fancybox-1.3.3.pack.js"></script>
<link href="<?php echo $this->config->item('admin_assets_path');?>css/jquery.fancybox-1.3.3.css" rel="stylesheet" type="text/css" />

<!-- style the file upload field -->
<script src="<?php echo $this->config->item('admin_assets_path');?>js/jquery.filestyle.mini.js"></script>

<!--table filter -->
<script src="<?php echo $this->config->item('admin_assets_path');?>js/jquery.uitablefilter.js"></script>

<!-- initialize scripts -->
<script src="<?php echo $this->config->item('admin_assets_path');?>js/initialize.js"></script>
</head>
<body>

<noscript>
<style>
#wrapper { display:none; }
#nojs { background:#FC3; border-bottom: 1px solid #F90; padding:15px; font-size:14px; font-weight:bold; text-align:center; }
</style>
<div id="nojs"><?php echo $this->lang->line('js_disabled');?></div>
</noscript>

<div id="wrapper" class="radius5 box-shadow">	
	<!-- head section -->
	<div id="head" class="radius-top6 gradient">
		<p id="logo"><a href="<?php echo base_url(); ?>admin/">Web MEME</a></p>
		<p class="float-left">
			<?php echo $this->lang->line('welcome')?>, 
			<strong>
			<?php if ($this->session->userdata('name') == ""):?>
				<?php echo $this->session->userdata('username')?>
			<?php else: ?>
				<?php echo $this->session->userdata('name')?>
			<?php endif; ?>
			</strong>
		</p>
		<p class="float-right"><a href="<?php echo base_url(); ?>admin/users/profile/"><?php echo $this->lang->line('edit_profile')?></a> - <a href="<?php echo base_url(); ?>admin/logout/"><span class="msg radius50"><?php echo $this->lang->line('logout');?></span></a></p>
		<div class="clear"></div>
	</div>
	<!-- /head section -->
	
	<!-- main navigation -->
	<ul id="nav">
	<?php 
		$module_path = APPPATH . 'modules/';
		$menu_path = '/includes/admin-menu.php';
		
		$module = 'menus'; if (file_exists($module_path . $module)) include ($module_path . $module . $menu_path);
		$module = 'labels'; if (file_exists($module_path . $module)) include ($module_path . $module . $menu_path);		
		$module = 'elements'; if (file_exists($module_path . $module)) include ($module_path . $module . $menu_path);
		$module = 'pages'; if (file_exists($module_path . $module)) include ($module_path . $module . $menu_path);
                $module = 'exhibitions'; if (file_exists($module_path . $module)) include ($module_path . $module . $menu_path);		                
                $module = 'collections'; if (file_exists($module_path . $module)) include ($module_path . $module . $menu_path);		                
                $module = 'artists'; if (file_exists($module_path . $module)) include ($module_path . $module . $menu_path);		                
                $module = 'works'; if (file_exists($module_path . $module)) include ($module_path . $module . $menu_path);		                
		$module = 'projects'; if (file_exists($module_path . $module)) include ($module_path . $module . $menu_path);                
		$module = 'photography'; if (file_exists($module_path . $module)) include ($module_path . $module . $menu_path);                
		$module = 'news'; if (file_exists($module_path . $module)) include ($module_path . $module . $menu_path);
		$module = 'blog'; if (file_exists($module_path . $module)) include ($module_path . $module . $menu_path);
                $module = 'subscribers'; if (file_exists($module_path . $module)) include ($module_path . $module . $menu_path);
		$module = 'users'; if (file_exists($module_path . $module)) include ($module_path . $module . $menu_path);
		$module = 'downloads'; if (file_exists($module_path . $module)) include ($module_path . $module . $menu_path);
	?>
	</ul>
	<!-- /main navigation -->
	
	<div class="clear"></div>
	
	<!-- main container (contains all page content) -->
	<div id="container">
	
		<!-- confirmation box -->
		<div id="confirm" class="ui-dialog" title="Confirm">
			<p><?php echo $this->lang->line('confirm_delete');?></p>
		</div>
		<div id="confirm-selected" class="ui-dialog" title="Confirm">
			<p><?php echo $this->lang->line('confirm_delete_selected');?></p>
		</div>	
		<!-- /confirmation box -->
	
		<div class="success"><?php echo $this->session->flashdata('info');?></div>
		<?php echo $content?>			
	</div>
</div>

<!-- footer section -->
<div id="footer"><?php echo $this->lang->line('cms_title');?> v<?php echo $this->config->item('cms_version'); ?></div>
<!-- /footer section -->

</body>
</html>