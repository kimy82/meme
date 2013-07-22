<script>
$(function() {
	// open confirm dialog box to confirm image delete
	$("#images-panel").find(".delete-image").each(function (i) {
		var $clickedItem = $(this);
		$clickedItem.click(function() {
			$("#confirm").dialog({
				modal: true,
				height: 130,
				buttons: {
					"OK": function() {		
						$( this ).dialog( "close" );
						$.post("<?php echo base_url(); ?>delete_news_image/", {id: $clickedItem.attr("rel"), <?php echo $this->config->item('csrf_token_name'); ?>: $('input[name="ci_token"]').val()});
						$clickedItem.parent().parent().fadeOut();
					},
					Cancel: function() {
						$( this ).dialog( "close" );
					}
				}
			});
		});
		return false;
	});		
	
	// style file upload field
	$("input[type=file]").filestyle({ 
		image: "<?php echo $this->config->item('admin_assets_path');?>images/file.png",
		imageheight : 30,
		imagewidth : 100,
		width : 250
	});
});
</script>

<?php echo validation_errors(); ?>
<?php echo form_open_multipart(''); ?>
	<input type="hidden" name="action" id="action" value="<?php echo $this->uri->segment(3); ?>" />
	<div class="box radius5 border">
		<div class="header gradient2">
                    <p><?php echo $this->uri->segment(3) == 'create' ? $this->lang->line('add_news') : $this->lang->line('edit_news'); ?></p>
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
			<p>
				<label for="datepicker"><?php echo $this->lang->line('date');?></label>
				<input type="text" name="date" class="datepicker" id="datepicker" value="<?php if ($this->uri->segment(3) == 'edit'): ?><?php echo isset($query) ? $query->date : '';?><?php echo set_value('date'); ?><?php else: ?><?php echo date("Y-m-d");?><?php endif; ?>" style="width:100px;" />
				<input type="text" name="time" value="<?php if ($this->uri->segment(3) == 'edit'): ?><?php echo isset($query) ? $query->time : '';?><?php echo set_value('time'); ?><?php else: ?><?php echo date("H:i:s");?><?php endif; ?>" style="width:60px;" />
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
							
			<p class="width50 float-left margin-r20">
				<label for="file"><?php echo $this->lang->line('image');?></label>
				<input type="file" id="file" name="userfile" size="60" />
			</p>
			
			<p class="width50 float-left">
				<label for="video"><?php echo $this->lang->line('video');?></label>
				<input type="text" id="video" name="video" value="<?php echo isset($query) ? $query->video : '';?><?php echo set_value('video'); ?>">
			</p>
			<div class="clear"></div>

			<p>
				<label for="status" class="short"><?php echo $this->lang->line('published');?></label>
				<input id="status" name="status" type="checkbox" value="1" <?php echo set_checkbox('status','1'); ?><?php if (isset($query) && $query->status == 1):?>checked="checked"<?php endif; ?> />
			</p>
			
			<p>
				<label for="short_text"><?php echo $this->lang->line('short_text');?></label>
				<textarea name="short_text" id="short_text" rows="20" cols="90" class="mceNoEditor" style="height:100px;"><?php echo isset($query) ? $query->short_text : '';?><?php echo set_value('short_text'); ?></textarea>	
			</p>
			
			<p>
				<label for="editor"><?php echo $this->lang->line('long_text');?></label>
				<div class="clear"></div>
				<?php echo form_tinymce(); ?>
				<textarea name="text" id="editor" rows="50" cols="90"><?php echo isset($query) ? $query->text : ''?><?php echo set_value('text'); ?></textarea>	
			</p>		
		</div>
	</div>	

	
	<?php if(isset($query) && $query->image != false && $this->uri->segment(3) == 'edit'): ?>
	<div class="box radius5 border">
		<div class="header gradient2">
			<p><?php echo $this->lang->line('images_panel_link');?></p>
		</div>
		<div class="content" id="images-panel" style="display:none;">	
			<div class="image">
				<input type="hidden" name="image" value="<?php echo $query->image;?>" />
				<a href="<?php echo base_url(); ?>uploads/news/<?php echo $query->image;?>" rel="lightbox"><img src="<?php echo base_url(); ?>uploads/news/<?php echo $query->image;?>" alt="" width="150" height="150"></a>
				<p><a href="javascript:;" rel="<?php echo $query->id;?>" class="delete-image"><?php echo $this->lang->line('delete');?></a></p>
			</div>
			<div class="clear"></div>		
		</div>
	</div>		
	<?php endif; ?>	
	
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
				<input type="text" id="meta_keywords" name="meta_keywords" value="<?php echo isset($query) ? $query->meta_keywords : ''?><?php echo set_value('meta_keywords'); ?>">
			</p>
			<p>
				<label for="meta_description"><?php echo $this->lang->line('meta_description');?></label>
				<input type="text" id="meta_description" name="meta_description" value="<?php echo isset($query) ? $query->meta_description : '';?><?php echo set_value('meta_description'); ?>">
			</p>
		</div>
	</div>
	<input name="submit" type="submit" value="<?php echo $this->lang->line('save');?>" />
<?php echo form_close(); ?>	