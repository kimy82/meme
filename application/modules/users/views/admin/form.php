<?php echo validation_errors(); ?>

<?php echo form_open(); ?>
	<div class="box radius5 border">
		<div class="header gradient2">
			<p>
			<?php if ($this->uri->segment(3) != 'profile'): ?>
				<?php echo $this->lang->line('add_user'); ?>
			<?php else: ?>
				<?php echo $this->lang->line('edit_profile'); ?>
			<?php endif; ?>
			</p>
		</div>
		<div class="content">
			<p>
				<label for="username"><?php echo $this->lang->line('username');?></label>
				<input type="text" id="username" name="username" value="<?php echo isset($query) ? $query->username : '';?><?php echo set_value('username'); ?>">
			</p>
			<p>
				<label for="password"><?php echo $this->lang->line('password');?></label>
				<input type="password" id="password" name="password" value="">
				<?php if ($this->uri->segment(3) != 'create'): ?><span class="text11 italic" style="padding-left:4px;"><?php echo $this->lang->line('leave_password');?></span><?php endif; ?>
			</p>
			<p>
				<label for="password2"><?php echo $this->lang->line('confirm_password');?></label>
				<input type="password" id="password2" name="password2" value="">
			</p>	
			<p>
				<label for="name"><?php echo $this->lang->line('name');?></label>
				<input type="text" id="name" name="name" value="<?php echo isset($query) ? $query->name : '';?><?php echo set_value('name'); ?>">
			</p>		
			<?php if ($this->uri->segment(3) != 'profile'): ?>
			<p>
				<label for="group"><?php echo $this->lang->line('user_group');?></label>
				<select id="group" name="group">
					<?php foreach ($groups as $row): ?>
					<option value="<?php echo $row->id;?>" <?php if (isset($query) && $query->group_id == $row->id):?>selected="selected"<?php endif; ?> <?php echo set_select('group',$row->id); ?>><?php echo $row->description;?></option>
					<?php endforeach; ?>
				</select>
			</p>
			<?php endif; ?>
		</div>
	</div>
	
	<input name="submit" type="submit" value="<?php echo $this->lang->line('save');?>" />
<?php echo form_close(); ?>