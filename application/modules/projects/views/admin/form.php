<script type="text/javascript">
    
        var System = { base_url : '<?php echo base_url();?>'};
        
$(function() {
    
    
        if ($("#action").val() != "edit") {
            <?php foreach(config_item('lang_uri_abbr') as $key => $value) : ?>
            $('#title_<?php echo $key; ?>').syncTranslit({destination:"slug_<?php echo $key; ?>"});
            <?php endforeach; ?>
	}	    
    
    
	$("#sort-images").sortable({
            stop: function(i) {
                    $.post("<?php echo base_url(); ?>reorder_project_images/", { items: $("#sort-images").sortable('serialize'), <?php echo $this->config->item('csrf_token_name'); ?>: $('input[name="ci_token"]').val() });   
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
			$.post("<?php echo base_url(); ?>update_project_image/", { item_id: $item_id, text: $content, <?php echo $this->config->item('csrf_token_name'); ?>: $('input[name="ci_token"]').val() });
		});
		
		var $clickedItem = $(this).find(".delete-image");
		$clickedItem.click(function() {
			$("#confirm").dialog({
				modal: true,
				height: 130,
				buttons: {
					"OK": function() {		
						$( this ).dialog( "close" );
						$.post("<?php echo base_url(); ?>delete_project_image/", {id: $clickedItem.attr("rel"), item_id: '<?php echo $this->uri->segment(4); ?>', position: $clickedItem.attr("rev"), <?php echo $this->config->item('csrf_token_name'); ?>: $('input[name="ci_token"]').val()});
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
			<p><?php echo $this->uri->segment(3) == 'create' ? $this->lang->line('add_project') : $this->lang->line('edit_project'); ?></p>
		</div>
		<div class="content">
			<p>
				<label for="datepicker"><?php echo $this->lang->line('date');?></label>
				<input type="text" name="date" class="datepicker" id="datepicker" value="<?php if ($this->uri->segment(3) == 'edit'): ?><?php echo isset($query) ? $query->date : '';?><?php echo set_value('date'); ?><?php else: ?><?php echo date("Y-m-d");?><?php endif; ?>" style="width:100px;" />
			</p>
                                              
                        
			<p class="width50 float-left margin-r20">
				<label for="title_es"><?php echo $this->lang->line('title');?> (ES)</label>
				<input type="text" name="title_es" id="title_es" value="<?php echo isset($query) ? $query->title_es : '';?><?php echo set_value('title_es'); ?>">
			</p>
			<p class="width50 float-left">
				<label for="slug_es"><?php echo $this->lang->line('url');?> (ES)</label>
				<input type="text" name="slug_es" id="slug_es" value="<?php echo isset($query) ? $query->slug_es : '';?><?php echo set_value('slug_es'); ?>">
			</p>
			<div class="clear"></div>
							
			<p class="width50 float-left margin-r20">
				<label for="title_en"><?php echo $this->lang->line('title');?> (EN)</label>
				<input type="text" name="title_en" id="title_en" value="<?php echo isset($query) ? $query->title_en : '';?><?php echo set_value('title_en'); ?>">
			</p>
			<p class="width50 float-left">
				<label for="slug_en"><?php echo $this->lang->line('url');?> (EN)</label>
				<input type="text" name="slug_en" id="slug_en" value="<?php echo isset($query) ? $query->slug_en : '';?><?php echo set_value('slug_en'); ?>">
			</p>
			<div class="clear"></div>
			

			<p>
				<label for="status" class="short"><?php echo $this->lang->line('published');?></label>
				<input id="status" name="status" type="checkbox" value="1" <?php echo set_checkbox('status','1'); ?><?php if (isset($query) && $query->status == 1):?>checked="checked"<?php endif; ?> />
			</p>
                        
			<p>
				<label for="realized_by_collaborator" class="short"><?php echo $this->lang->line('realized_by_collaborator');?></label>
				<input id="realized_by_collaborator" name="realized_by_collaborator" type="checkbox" value="1" <?php echo set_checkbox('realized_by_collaborator','1'); ?><?php if (isset($query) && $query->realized_by_collaborator == 1):?>checked="checked"<?php endif; ?> />
			</p>                         
			
			<p>
				<label for="text_es"><?php echo $this->lang->line('long_text');?> (ES)</label>
				<div class="clear"></div>
				<?php echo form_tinymce(); ?>
				<textarea name="text_es" id="editor1" rows="50" cols="90"><?php echo isset($query) ? $query->text_es : ''?><?php echo set_value('text_es'); ?></textarea>	
			</p>		
                        
			<p>
				<label for="text_en"><?php echo $this->lang->line('long_text');?> (EN)</label>
				<div class="clear"></div>
				<?php echo form_tinymce(); ?>
				<textarea name="text_en" id="editor2" rows="50" cols="90"><?php echo isset($query) ? $query->text_en : ''?><?php echo set_value('text_en'); ?></textarea>	
			</p>		                        
                        
			<p class="width50 float-left margin-r20">
				<label for="customer"><?php echo $this->lang->line('customer');?></label>
				<input type="text" name="customer" id="customer" value="<?php echo isset($query) ? $query->customer : '';?><?php echo set_value('customer'); ?>">
			</p>
			<p class="width50 float-left">
				<label for="location"><?php echo $this->lang->line('location');?></label>
				<input type="text" name="location" id="location" value="<?php echo isset($query) ? $query->location : '';?><?php echo set_value('location'); ?>">
			</p>                        
			<div class="clear"></div>                        
                        
			<p class="width50 float-left margin-r20">
				<label for="year"><?php echo $this->lang->line('year');?></label>
				<input type="text" name="year" id="year" value="<?php echo isset($query) ? $query->year : '';?><?php echo set_value('year'); ?>">
			</p>
			<p class="width50 float-left">
				<label for="area"><?php echo $this->lang->line('area');?></label>
				<input type="text" name="area" id="area" value="<?php echo isset($query) ? $query->area : '';?><?php echo set_value('area'); ?>">
			</p>                        
			<div class="clear"></div>                        
                        
			<p class="width50 float-left margin-r20">
				<label for="photographer"><?php echo $this->lang->line('photographer');?></label>
				<input type="text" name="photographer" id="photographer" value="<?php echo isset($query) ? $query->photographer : '';?><?php echo set_value('photographer'); ?>">
			</p>
			<p class="width50 float-left">
				<label for="team"><?php echo $this->lang->line('team');?></label>
                                <textarea name="team" id="team"><?php echo isset($query) ? $query->team : '';?><?php echo set_value('team'); ?></textarea>
			</p> 
                        
                        <!-- imatges -->
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
					<a href="<?php echo base_url(); ?>uploads/projects/<?php echo $image->name;?>" rel="lightbox"><img src="<?php echo image('uploads/projects/', $image->name, 140, 140); ?>" alt="" width="140" height="140"></a>	
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
				<label for="seo_page_title_es"><?php echo $this->lang->line('seo_browser_title');?> (ES)</label>
				<input type="text" id="seo_page_title_es" name="seo_page_title_es" value="<?php echo isset($query) ? $query->seo_page_title_es : '';?><?php echo set_value('seo_page_title_es'); ?>">
			</p>
			<p>
				<label for="seo_page_title_en"><?php echo $this->lang->line('seo_browser_title');?> (EN)</label>
				<input type="text" id="seo_page_title_en" name="seo_page_title_en" value="<?php echo isset($query) ? $query->seo_page_title_en : '';?><?php echo set_value('seo_page_title_en'); ?>">
			</p>
			<p>
				<label for="seo_h1_title_es"><?php echo $this->lang->line('seo_h1_title');?> (ES)</label>
				<input type="text" id="seo_h1_title_es" name="seo_title_es" value="<?php echo isset($query) ? $query->seo_title_es : '';?><?php echo set_value('seo_title_es'); ?>">
			</p>
			<p>
				<label for="seo_h1_title_en"><?php echo $this->lang->line('seo_h1_title');?> (EN)</label>
				<input type="text" id="seo_h1_title_en" name="seo_title_en" value="<?php echo isset($query) ? $query->seo_title_en : '';?><?php echo set_value('seo_title_en'); ?>">
			</p>
			<p>
				<label for="meta_keywords_es"><?php echo $this->lang->line('meta_keywords');?> (ES)</label>
				<input type="text" id="meta_keywords_es" name="meta_keywords_es" value="<?php echo isset($query) ? $query->meta_keywords_es : ''?><?php echo set_value('meta_keywords_es'); ?>">
			</p>
			<p>
				<label for="meta_keywords_en"><?php echo $this->lang->line('meta_keywords');?> (EN)</label>
				<input type="text" id="meta_keywords_en" name="meta_keywords_en" value="<?php echo isset($query) ? $query->meta_keywords_en : ''?><?php echo set_value('meta_keywords_en'); ?>">
			</p>
			<p>
				<label for="meta_description_es"><?php echo $this->lang->line('meta_description');?> (ES)</label>
				<input type="text" id="meta_description_es" name="meta_description_es" value="<?php echo isset($query) ? $query->meta_description_es : '';?><?php echo set_value('meta_description_es'); ?>">
			</p>
			<p>
				<label for="meta_description_en"><?php echo $this->lang->line('meta_description');?> (EN)</label>
				<input type="text" id="meta_description_en" name="meta_description_en" value="<?php echo isset($query) ? $query->meta_description_en : '';?><?php echo set_value('meta_description_en'); ?>">
			</p>
		</div>
	</div>
	<input name="submit" type="submit" value="<?php echo $this->lang->line('save');?>" />
<?php echo form_close(); ?>	