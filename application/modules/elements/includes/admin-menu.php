<li><a href="<?php echo base_url(); ?>admin/elements/"><?php echo $this->lang->line('elements');?></a>
	<ul<?php if ($this->session->userdata('group_id') < 4):?> style="display:none;"<?php endif; ?>>
		<li><a href="<?php echo base_url(); ?>admin/elements/create/"><?php echo $this->lang->line('add_element')?></a></li>
	</ul>
</li>