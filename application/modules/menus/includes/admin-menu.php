<li><a href="<?php echo base_url(); ?>admin/menus/"><?php echo $this->lang->line('menu')?></a>
	<ul<?php if ($this->session->userdata('group_id') < 4):?> style="display:none;"<?php endif; ?>>
		<li><a href="<?php echo base_url(); ?>admin/menus/create/"><?php echo $this->lang->line('add_menu')?></a></li>
	</ul>
</li>