<li><a href="<?php echo base_url(); ?>admin/labels/"><?php echo $this->lang->line('labels');?></a>
	<ul<?php if ($this->session->userdata('group_id') < 4):?> style="display:none;"<?php endif; ?>>
		<li><a href="<?php echo base_url(); ?>admin/labels/create/"><?php echo $this->lang->line('add_label');?></a></li>
	</ul>
</li>