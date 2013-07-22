<div class="box radius5 border">
	<div class="header gradient2">
		<p><?php echo $this->lang->line('users'); ?></p>
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
					<th><?php echo $this->lang->line('username');?></th>
					<th><?php echo $this->lang->line('name');?></th>
					<th width="100"><?php echo $this->lang->line('user_group');?></th>
					<th style="width:65px;">&nbsp;</th>
				</tr>
			</thead>
			<tbody>	
				<?php foreach($query as $row): ?>
				<tr>
					
					<td><a style="border-bottom:1px dotted #000;" href="mailto:<?php echo $row->username;?>"><?php echo $row->username;?></a></td>
					<td><?php if ($row->name == false): ?>-<?php else: ?><?php echo $row->name;?><?php endif; ?></td>
					<td><?php echo $row->user_group_title;?></td>
					<td><a href="<?php echo base_url(); ?>admin/users/edit/<?php echo $row->id;?>" class="edit"></a> <a href="<?php echo base_url(); ?>admin/users/delete/<?php echo $row->id;?>" class="delete"></a></td>
				</tr>
				<?php endforeach; ?>
			</tbody> 
		</table>
	</div>
	<div class="paginator float-right"><?php echo $this->pagination->create_links();?></div>
	<div class="clear"></div>
</div>