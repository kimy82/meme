<?php echo validation_errors(); ?>

<?php echo form_open(); ?>

<div class="box radius5 border">
	<div class="header gradient2">
            <p><?php echo $this->uri->segment(3) == 'create' ? $this->lang->line('add_label') : $this->lang->line('edit_label'); ?></p>
	</div>
	<div class="content">
		<p>
		<label for="lang"><?php echo $this->lang->line('language')?></label>
		<select id="lang" name="lang">
			<?php foreach ($this->config->item('lang_uri_abbr') as $key => $value): ?>
			<option<?php if (isset($query) && $query->lang == $key):?> selected="selected"<?php endif; ?> value="<?php echo $key?>"<?php echo set_select('lang',$key); ?>><?php echo $value?></option>
			<?php endforeach; ?>
		</select>	
		</p>
		<p>			
			<label for="identifier"><?php echo $this->lang->line('identifier')?></label>
			<input type="text" id="identifier" name="identifier" value="<?php echo isset($query) ? $query->identifier : ''?><?php echo set_value('identifier'); ?>">
		</p>
		<p>
			<label for="title"><?php echo $this->lang->line('title')?></label>
			<input type="text" id="title" name="text" value="<?php echo isset($query) ? $query->text : ''?><?php echo set_value('text'); ?>">
		</p>
	</div>
</div>

<input name="submit" type="submit" value="<?php echo $this->lang->line('save')?>" />

<?php echo form_close(); ?>	