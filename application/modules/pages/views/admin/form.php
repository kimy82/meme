<?php echo validation_errors(); ?>

<?php echo form_open(); ?>
<input type="hidden" name="action" id="action" value="<?php echo $this->uri->segment(3); ?>" />	

<div class="box radius5 border">
	<div class="header gradient2">
            <p><?php echo $this->uri->segment(3) == 'create' ? $this->lang->line('add_page') : $this->lang->line('edit_page'); ?></p>
	</div>
	<div class="content">
		<p>
			<label for="lang"><?php echo $this->lang->line('language');?></label>	
			<select id="lang" name="lang">
				<?php foreach ($this->config->item('lang_uri_abbr') as $key => $value): ?>
				<option<?php if (isset($query) && $query->lang == $key):?> selected="selected"<?php endif; ?> value="<?php echo $key;?>"<?php echo set_select('lang',$key); ?>><?php echo $value;?></option>
				<?php endforeach; ?>
			</select>					
		</p>
		<p class="width50 float-left margin-r20">
			<label for="title"><?php echo $this->lang->line('title');?></label>
			<input type="text" name="title" id="title" value="<?php echo isset($query) ? $query->title : '';?><?php echo set_value('title'); ?>">
		</p>
		<p class="width50 float-left">
			<label for="slug"><?php echo $this->lang->line('url');?></label>
			<input type="text" name="slug" id="slug" value="<?php echo isset($query) ? $query->slug : '';?><?php echo set_value('slug'); ?>">
		</p>
		<div class="clear"></div>
		<?php echo form_tinymce(); ?>
		<textarea name="text" cols="" id="editor" rows="10"><?php echo isset($query) ? $query->text : '';?><?php echo set_value('text'); ?></textarea>		
	</div>
</div>

<div class="box radius5 border">
	<div class="header gradient2">
		<p><?php echo $this->lang->line('seo_panel_link');?></p>
	</div>
	<div class="content" style="display:none;">
		<p>
			<label for="seo_page_title"><?php echo $this->lang->line('seo_browser_title');?></label>
			<input type="text" id="seo_page_title" name="seo_page_title" value="<?php echo isset($query) ? $query->seo_page_title : '';?><?php echo set_value('seo_page_title'); ?>">
		</p>
		
		<p>
			<label for="seo_h1_title"><?php echo $this->lang->line('seo_h1_title');?></label>
			<input type="text" id="seo_h1_title" name="seo_title" value="<?php echo isset($query) ? $query->seo_title : '';?><?php echo set_value('seo_title'); ?>">
		</p>
		
		<p>
			<label for="meta_keywords"><?php echo $this->lang->line('meta_keywords');?></label>
			<input type="text" id="meta_keywords" name="meta_keywords" value="<?php echo isset($query) ? $query->meta_keywords : '';?><?php echo set_value('meta_keywords'); ?>">
		</p>

		<p>
			<label for="meta_description"><?php echo $this->lang->line('meta_description');?></label>
			<input type="text" id="meta_description" name="meta_description" value="<?php echo isset($query) ? $query->meta_description : '';?><?php echo set_value('meta_description'); ?>">
		</p>
	</div>
</div>

<div class="box radius5 border">
	<div class="header gradient2">
		<p><?php echo $this->lang->line('advanced_panel_link');?></p>
	</div>
	<div class="content" style="display:none;">
		<p>
			<label for="template"><?php echo $this->lang->line('template');?></label>
			<select id="template" name="template">
				<?php foreach ($this->config->item('templates') as $key => $value): ?>
				<option <?php if (isset($query) && $query->tpl == $key):?>selected="selected"<?php endif; ?> value="<?php echo $key;?>" <?php echo set_select('template',$key); ?>><?php echo $value;?></option>
				<?php endforeach; ?>
			</select>
		</p>
	</div>
</div>

<input name="submit" type="submit" value="<?php echo $this->lang->line('save');?>" />
<?php echo form_close(); ?>	