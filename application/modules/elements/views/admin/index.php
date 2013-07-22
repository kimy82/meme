<div class="box radius5 border">
	<div class="header gradient2">
		<p><?php echo $this->lang->line('elements'); ?></p>
	</div>
	
	<!-- filter -->
	<div class="filter-wrapper">
		<form id="filter-form">
			<p><label for="filter"><?php echo $this->lang->line('filter');?>:</label> <input name="filter" id="filter" value="" maxlength="30" size="50" type="text"></p>		
		</form>
	</div>
	<!-- /filter -->	
	
	<div class="table-items">
		<table style="width:100%" class="list sortable">
			<thead>
				<tr>
					<th><?php echo $this->lang->line('identifier')?></th>
					<th><?php echo $this->lang->line('title')?></th>
					<th width="50"><?php echo $this->lang->line('language')?></th>
					<th<?php if ($this->session->userdata('group_id') == 4):?> style="width:65px;"<?php else: ?> style="width:45px;"<?php endif; ?>>&nbsp;</th>
				</tr>
			</thead>
			<tbody>	
				<?php foreach($query as $row): ?>
				<tr>
					<td><?php echo $row->identifier?></td>
					<td><?php echo $row->title?>&nbsp;</td>
					<td align="center"><?php echo $row->lang?></td>
					<td>
						<a href="<?php echo base_url(); ?>admin/elements/edit/<?php echo $row->id?>" class="edit"></a> 
						<?php if ($this->session->userdata('group_id') == 4):?>
							<a href="<?php echo base_url(); ?>admin/elements/delete/<?php echo $row->id?>" class="delete"></a>
						<?php endif; ?>
					</td>
				</tr>
				<?php endforeach; ?>
			</tbody> 
		</table>
	</div>
	<div class="paginator float-right"><?php echo $this->pagination->create_links();?></div>
	<div class="clear"></div>
</div>	