<div class="box radius5 border">
	<div class="header gradient2">
		<p><?php echo $this->lang->line('pages'); ?></p>
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
					<th><?php echo $this->lang->line('url');?></th>
					<th width="50"><?php echo $this->lang->line('language');?></th>
					<th style="width:65px;">&nbsp;</th>
				</tr>
			</thead>
			<tbody>	
				<?php foreach($query as $row): ?>
				<tr id="item_<?php echo $row->id;?>">
					<td><?php echo $row->title;?></td>
					<td><a style="border-bottom:1px dotted #000;" href="<?php echo base_url(); ?><?php if ($row->lang != $this->config->item('language_abbr')): ?><?php echo $row->lang;?>/<?php endif; ?><?php echo $row->slug;?>" target="_blank"><?php echo $row->slug;?></a></td>
					<td align="center"><?php echo $row->lang?></td>
					<td><a href="<?php echo base_url(); ?>admin/pages/edit/<?php echo $row->id;?>" class="edit"></a> <a href="<?php echo base_url(); ?>admin/pages/delete/<?php echo $row->id;?>" class="delete" id="del_<?php echo $row->id;?>"></a></td>
				</tr>
				<?php endforeach; ?>
			</tbody> 
		</table>
	</div>
	<div class="paginator float-right"><?php echo $this->pagination->create_links();?></div>
	<div class="clear"></div>
</div>