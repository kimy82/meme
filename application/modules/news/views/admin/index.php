<div class="box radius5 border">
	<div class="header gradient2">
		<p><?php echo $this->lang->line('news'); ?></p>
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
					<th><?php echo $this->lang->line('title');?></th>
					<th><?php echo $this->lang->line('date');?></th>
					<th width="40"><?php echo $this->lang->line('status');?></th>
					<th width="70"><?php echo $this->lang->line('language');?></th>
					<th width="65">&nbsp;</th>
				</tr>
			</thead>
			<tbody>	
				<?php foreach($query as $row): ?>
				<tr>
					<td><?php echo $row->title;?></td>
					<td><?php echo date($this->config->item('log_date_format'), strtotime($row->date)); ?> // <?php echo date($this->config->item('log_time_format'), strtotime($row->time)); ?></td>
					<td align="center"><img src="<?php echo $this->config->item('admin_assets_path');?>images/<?php if ($row->status == 1): ?>ok<?php else: ?>error<?php endif; ?>.png" alt="" /></td>
					<td align="center"><?php echo $row->lang;?></td>
					<td><a href="<?php echo base_url(); ?>admin/news/edit/<?php echo $row->id;?>" class="edit"></a> <a href="<?php echo base_url(); ?>admin/news/delete/<?php echo $row->id?>" class="delete" id="del_<?php echo $row->id;?>"></a></td>
				</tr>
				<?php endforeach; ?>
			</tbody> 
		</table>
	</div>
	<div class="paginator float-right"><?php echo $this->pagination->create_links();?></div>
	<div class="clear"></div>
</div>	