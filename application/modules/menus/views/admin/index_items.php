<script>
function confirmSubmit() {
	var agree=confirm("<?php echo $this->lang->line('confirm_delete_selected');?>");
	if (agree) return true ; else return false ;
}
</script>

<?php echo form_open(); ?>

	<div class="box radius5 border">
		<div class="header gradient2">
			<p><?php echo $this->lang->line('add_menu'); ?></p>
		</div>		
		
		<div class="table-items">
			<input type="hidden" name="identifier" value="" />
			<table style="width:100%" class="list sortable">
				<thead>
					<tr>
						<th style="width:20px;"><input name="checkbox" type="checkbox" value="" class="check-all" /></th>
						<th><?php echo $this->lang->line('title');?></th>
						<th><?php echo $this->lang->line('url');?></th>
						<th style="text-align:center"><?php echo $this->lang->line('status');?></th>
						<th style="text-align:center"><?php echo $this->lang->line('target');?></th>
					</tr>
				</thead>
				<tbody>
					<?php  $i = 0 ;?>
					<?php foreach($query as $row): ?>					
					<tr>
						<td>
						<input type="hidden" name="id[<?php echo $i;?>]" value="<?php echo $row->id;;?>">
						<input name="select[<?php echo $i;?>]" type="checkbox" class="delete-checkbox" value="<?php echo $row->id;?>" /></td>
						<td><input name="title[<?php echo $i;?>]" type="text" style="width:250px;" value="<?php echo $row->title;?>" /></td>
						<td><input name="url[<?php echo $i;?>]" type="text" style="width:250px;" value="<?php echo $row->url;?>" /></td>
						<td style="text-align:center"><input name="status[<?php echo $i;?>]" type="checkbox" value="1"<?php if ($row->status == 1): ;?> checked="checked"<?php endif;?> /></td>
						<td style="text-align:center"><input name="target[<?php echo $i;?>]" type="checkbox" value="1"<?php if ($row->target == 1): ;?> checked="checked"<?php endif;?> /></td>
					</tr>
					<?php $i++ ;?>
					<?php endforeach;?>
					<tr>
						<td>&nbsp;</td>
						<td><input name="new_title" type="text" style="width:250px;" value="" /></td>
						<td><input name="new_url" type="text" style="width:250px;" value="" /></td>
						<td style="text-align:center"><input name="new_status" type="checkbox" value="1" /></td>
						<td style="text-align:center"><input name="new_target" type="checkbox" value="1" /></td>
					</tr>
				</tbody> 
			</table>	
		</div>
	</div>

	<input name="delete" type="submit" value="<?php echo $this->lang->line('delete_selected');?>" class="delete-selected" onclick="return confirmSubmit();" />
	<a class="submit" style="" href="<?php echo base_url(); ?>admin/menuitems/reorder/<?php echo $this->uri->segment(3);?>/"><?php echo $this->lang->line('change_order');?></a>
	<input name="submit" type="submit" value="<?php echo $this->lang->line('save');?>" />

<?php echo form_close(); ?>	