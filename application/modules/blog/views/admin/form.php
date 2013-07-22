<script type="text/javascript">
    
        var System = { base_url : '<?php echo base_url();?>'};    
    
$(function() {
    
	$("#sort-images").sortable({
            stop: function(i) {
                    $.post("<?php echo base_url(); ?>reorder_blog_images/", { items: $("#sort-images").sortable('serialize'), <?php echo $this->config->item('csrf_token_name'); ?>: $('input[name="ci_token"]').val() });   
            }}
	);       
    
    
	$("#images-panel").find(".image").each(function(i) {
		var $image_desc = $(this).find(".image-desc");
                var $image_layout = $(this).find(".image-layout");
		var $edit_button = $(this).find(".edit-image");
		var $item_id = $image_desc.attr("id");
		
		$edit_button.click(function() {
			$image_desc.toggle();
		});
		
		$image_desc.blur(function() {	
			var $content = $(this).val();
			$.post("<?php echo base_url(); ?>update_blog_image/", { item_id: $item_id, text: $content, <?php echo $this->config->item('csrf_token_name'); ?>: $('input[name="ci_token"]').val() });
		});
		
		var $clickedItem = $(this).find(".delete-image");
		$clickedItem.click(function() {
			$("#confirm").dialog({
				modal: true,
				height: 130,
				buttons: {
					"OK": function() {		
						$( this ).dialog( "close" );
						$.post("<?php echo base_url(); ?>delete_blog_image/", {id: $clickedItem.attr("rel"), item_id: '<?php echo $this->uri->segment(4); ?>', position: $clickedItem.attr("rev"), <?php echo $this->config->item('csrf_token_name'); ?>: $('input[name="ci_token"]').val()});
						$clickedItem.parent().parent().fadeOut();
					},
					Cancel: function() {
						$( this ).dialog( "close" );
					}
				}
			});
			return false;
		});	
	});	
	
	$(".existing_images").click(function() {
		$("#upload-fields, .existing-images-help, #text-fields").toggle();
	});
});
</script>

<?php echo validation_errors(); ?>
<?php echo form_open_multipart(''); ?>
	<input type="hidden" name="action" id="action" value="<?php echo $this->uri->segment(3); ?>" />
	<div class="box radius5 border">
		<div class="header gradient2">
                    <p><?php echo $this->uri->segment(3) == 'create' ? $this->lang->line('add_post') : $this->lang->line('edit_post'); ?></p>
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
							
			<p class="float-left">
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
                        

			<!--<label for="existing_images" class="short"><?php echo $this->lang->line('use_existing_images');?></label>
			<input name="existing_images" id="existing_images" class="existing_images" type="checkbox" value="1" /> -->
			
                        <div class="clear"></div>
                        
			<p class="existing-images-help warning2" style="display:none;"><?php echo $this->lang->line('use_existing_images_help');?></p>
			<div class="fields-container">
				<div id="upload-fields">
					<p><span class="number">1</span> <input name="image1" type="file" class="file-field" size="40" /> &nbsp; <?php echo $this->lang->line('image_desc');?>: <input name="image_desc1" type="text" value="" style="width:300px;"></p>
					<p><span class="number">2</span> <input name="image2" type="file" class="file-field" size="40" /> &nbsp; <?php echo $this->lang->line('image_desc');?>: <input name="image_desc2" type="text" value="" style="width:300px;"></p>
					<p><span class="number">3</span> <input name="image3" type="file" class="file-field" size="40" /> &nbsp; <?php echo $this->lang->line('image_desc');?>: <input name="image_desc3" type="text" value="" style="width:300px;"></p>
					<p><span class="number">4</span> <input name="image4" type="file" class="file-field" size="40" /> &nbsp; <?php echo $this->lang->line('image_desc');?>: <input name="image_desc4" type="text" value="" style="width:300px;"></p>
					<p><span class="number">5</span> <input name="image5" type="file" class="file-field" size="40" /> &nbsp; <?php echo $this->lang->line('image_desc');?>: <input name="image_desc5" type="text" value="" style="width:300px;"></p>			
				</div>
				<div id="text-fields" style="display:none;">
					<p><span class="number">1</span> <input name="existing_image1" type="text" class="file-field" size="40" style="width:300px;" /> &nbsp; <?php echo $this->lang->line('image_desc');?>: <input name="existing_image_desc1" type="text" value="" style="width:300px;"></p>
					<p><span class="number">2</span> <input name="existing_image2" type="text" class="file-field" size="40" style="width:300px;" /> &nbsp; <?php echo $this->lang->line('image_desc');?>: <input name="existing_image_desc2" type="text" value="" style="width:300px;"></p>
					<p><span class="number">3</span> <input name="existing_image3" type="text" class="file-field" size="40" style="width:300px;" /> &nbsp; <?php echo $this->lang->line('image_desc');?>: <input name="existing_image_desc3" type="text" value="" style="width:300px;"></p>
					<p><span class="number">4</span> <input name="existing_image4" type="text" class="file-field" size="40" style="width:300px;" /> &nbsp; <?php echo $this->lang->line('image_desc');?>: <input name="existing_image_desc4" type="text" value="" style="width:300px;"></p>
					<p><span class="number">5</span> <input name="existing_image5" type="text" class="file-field" size="40" style="width:300px;" /> &nbsp; <?php echo $this->lang->line('image_desc');?>: <input name="existing_image_desc5" type="text" value="" style="width:300px;"></p>			
				</div>
			</div>          
                        <!-- end imatges -->
                        
			<div class="clear"></div>                           
                        
		</div>
	</div>	

	
	<?php if(isset($images) && $images != false && $this->uri->segment(3) == 'edit'): ?>
	<div class="box radius5 border">
		<div class="header gradient2">
			<p><?php echo $this->lang->line('images_panel_link');?></p>
		</div>
		<div class="content" id="images-panel" style="display:block;">	
			<div id="sort-images">
				<?php foreach($images as $image): ?>
				<div class="image" id="item_<?php echo $image->id; ?>">
					<span class="drag-handle"></span>
					<a href="<?php echo base_url(); ?>uploads/blog/<?php echo $image->name;?>" rel="lightbox"><img src="<?php echo image('uploads/blog/', $image->name, 140, 140); ?>" alt="" width="140" height="140"></a>	
					<p><textarea id="<?php echo $image->id;?>" name="image_desc" cols="10" rows="3" class="mceNoEditor image-desc" style="width:125px; height:40px; font-size:11px; display:none;"><?php echo $image->text; ?></textarea></p>
					<p>
                                           <input type="hidden" name="image_layout" id="image_layout_<?php echo $image->id;?>" class="image-layout" value="<?php echo $image->layout; ?>" />
						<a href="javascript:;" rel="<?php echo $image->id;?>" rev="<?php echo $image->position;?>" class="delete-image"><?php echo $this->lang->line('delete');?></a>
						<a href="javascript:;" rel="<?php echo $image->id;?>" class="edit-image"><?php echo $this->lang->line('edit');?></a>
					</p>
				</div>
				<?php endforeach; ?>
				<div class="clear"></div>	
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