<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<?php $this->lang->load($this->config->item('admin_language'), $this->config->item('admin_language')); ?>
<title><?php echo $this->lang->line('cms_title');?></title>
<!-- main css -->
<link href="<?php echo $this->config->item('admin_assets_path');?>css/default.css" rel="stylesheet" type="text/css" />
<link href="<?php echo $this->config->item('admin_assets_path');?>css/login.css" rel="stylesheet" type="text/css" />

<!-- jquery -->
<script src="<?php echo $this->config->item('admin_assets_path');?>js/jquery-1.4.2.min.js"></script>

<!-- initialize scripts -->
<script src="<?php echo $this->config->item('admin_assets_path');?>js/initialize.js"></script>
</head>
<body>

<noscript>
<style>
#login-wrapper { display:none; }
#nojs { background:#FC3; border-bottom: 1px solid #F90; padding:15px; font-size:14px; font-weight:bold; text-align:center; }
</style>
<div id="nojs"><?php echo $this->lang->line('js_disabled');?></div>
</noscript>

<div id="login-wrapper" class="radius5 box-shadow">
	
	<!-- head section -->
	<div id="head" class="radius-top6 gradient">
		<p id="logo"><?php echo $this->lang->line('login_to_admin');?></p>
		<div class="clear"></div>
	</div>
	<!-- /head section -->
	
	<!-- main container (contains all page content) -->
	<div id="container">
		
		<!-- messages section (error, warning, success) -->
		<?php echo validation_errors(); ?>
		<?php if ($error): ?><div class="error"><?php echo $error; ?></div><?php endif; ?>
		<!-- /messages section -->	
		
		<!-- form elements section -->
		<?php echo form_open('admin/login', 'name="login"'); ?>
			<p><label for="username"><?php echo $this->lang->line('username');?></label><input name="username" id="username" type="text" value="<?php echo set_value('username'); ?>"></p>
			<p><label for="password"><?php echo $this->lang->line('password');?></label><input name="password" id="password" type="password" value=""></p>
			<p class="float-left"><input name="submit" type="submit" value="<?php echo $this->lang->line('login');?>"></p>
			<div class="clear"></div>
		<?php echo form_close(); ?>		
		<!-- /form elements section -->			
	</div>
</div>

<!-- footer section -->
<div id="footer"><?php echo $this->lang->line('cms_title');?> v<?php echo $this->config->item('cms_version'); ?></div>
<!-- /footer section -->

</body>
</html>