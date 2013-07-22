<style>
#sort-images-pdf{
	float: left;
	width: 25%;
}
#sort-pdf{
	float: rigth;
	width: 50%;
}
</style>
<script type="text/javascript">
    
        var System = { base_url : '<?php echo base_url();?>'};
        var numPdf=1;
        var txt1="<?php echo $this->lang->line('img_desc_pdf');?>";
        var txt2="<?php echo $this->lang->line('pdf_desc');?>";
        
function addPdf(){
	if(numPdf==10)return;
	numPdf=numPdf+1;
	document.getElementById("pdf_p_"+numPdf).style.visibility= "visible";
	document.getElementById("pdf_p_"+numPdf).style.display= "";
	//("#upload-fields").append("<p><span class=\"number\"> "+txt1+numPdf+"</span> <input name=\"image"+numPdf+"\" type=\"file\" class=\"file-field\" size=\"40\" /> &nbsp; "+txt2+": <input name=\"image_desc"+numPdf+"\" type=\"text\" value=\"\" style=\"width:300px;\">&nbsp; PDF <input name=\"pdf"+numPdf+"\" type=\"file\" class=\"file-field\" size=\"40\" /> </p>");
}

$(function() {
    
    
        if ($("#action").val() != "edit") {
            <?php foreach(config_item('lang_uri_abbr') as $key => $value) : ?>
            $('#title_<?php echo $key; ?>').syncTranslit({destination:"slug_<?php echo $key; ?>"});
            <?php endforeach; ?>
	}	    
    
    
	$("#sort-images").sortable({
            stop: function(i) {
                    $.post("<?php echo base_url(); ?>reorder_photography_images/", { items: $("#sort-images").sortable('serialize'), <?php echo $this->config->item('csrf_token_name'); ?>: $('input[name="ci_token"]').val() });   
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
			$.post("<?php echo base_url(); ?>update_photography_image/", { item_id: $item_id, text: $content, <?php echo $this->config->item('csrf_token_name'); ?>: $('input[name="ci_token"]').val() });
		});
		
		var $clickedItem = $(this).find(".delete-image");
		$clickedItem.click(function() {
			$("#confirm").dialog({
				modal: true,
				height: 130,
				position: 'center',
				buttons: {
					"OK": function() {		
						$( this ).dialog( "close" );
						$.post("<?php echo base_url(); ?>delete_image_pdf/", {id: $clickedItem.attr('rel'), item_id: '<?php echo $this->uri->segment(4); ?>', <?php echo $this->config->item('csrf_token_name'); ?>: $('input[name="ci_token"]').val()});
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
});
</script>

<?php echo validation_errors(); ?>
<?php echo form_open_multipart(''); ?>
	<input type="hidden" name="action" id="action" value="<?php echo $this->uri->segment(3); ?>" />
	<div class="box radius5 border">
		<div class="header gradient2">
			<p><?php echo $this->uri->segment(3) == 'create' ? $this->lang->line('add_download'): $this->lang->line('edit_download') ?></p>
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
			
			<input type="hidden" name="numImages" id="numImages" value="1" />

			<p>
				<label for="status" class="short"><?php echo $this->lang->line('published');?></label>
				<input id="status" name="status" type="checkbox" value="1" <?php echo set_checkbox('status','1'); ?><?php if (isset($query) && $query->status == 1):?>checked="checked"<?php endif; ?> />
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
                        
			
			                     
			<div class="clear"></div>                        
                        
			<p class="width50 float-left margin-r20">
				<label for="year"><?php echo $this->lang->line('year');?></label>
				<input type="text" name="year" id="year" value="<?php echo isset($query) ? $query->year : '';?><?php echo set_value('year'); ?>">
			</p>
			                     
			<div class="clear"></div>                                                                                         
                        <div class="clear"></div>
                        
			<p class="existing-images-help warning2" style="display:none;"><?php echo $this->lang->line('use_existing_images_help');?></p>
			<div class="fields-container">
				<div id="upload-fields">
					<p><span class="number"><?php echo $this->lang->line('img_desc_pdf');?> 1</span> <input name="image1" type="file" class="file-field" size="40" /> &nbsp; <?php echo $this->lang->line('pdf_desc');?>: <input name="image_desc1" type="text" value="" style="width:300px;"> &nbsp; PDF <input name="pdf1" type="file" class="file-field" size="40" /></p>			
					<p id="pdf_p_2" style="visibility: hidden; display: none;" ><span class="number"><?php echo $this->lang->line('img_desc_pdf');?> 2</span> <input name="image2" type="file" class="file-field" size="40" /> &nbsp; <?php echo $this->lang->line('pdf_desc');?>: <input name="image_desc2" type="text" value="" style="width:300px;"> &nbsp; PDF <input name="pdf2" type="file" class="file-field" size="40" /></p>
					<p id="pdf_p_3" style="visibility: hidden; display: none;"  ><span class="number"><?php echo $this->lang->line('img_desc_pdf');?> 3</span> <input name="image3" type="file" class="file-field" size="40" /> &nbsp; <?php echo $this->lang->line('pdf_desc');?>: <input name="image_desc3" type="text" value="" style="width:300px;"> &nbsp; PDF <input name="pdf3" type="file" class="file-field" size="40" /></p>
					<p id="pdf_p_4" style="visibility: hidden; display: none;"  ><span class="number"><?php echo $this->lang->line('img_desc_pdf');?> 4</span> <input name="image4" type="file" class="file-field" size="40" /> &nbsp; <?php echo $this->lang->line('pdf_desc');?>: <input name="image_desc4" type="text" value="" style="width:300px;"> &nbsp; PDF <input name="pdf4" type="file" class="file-field" size="40" /></p>
					<p id="pdf_p_5" style="visibility: hidden; display: none;"  ><span class="number"><?php echo $this->lang->line('img_desc_pdf');?> 5</span> <input name="image5" type="file" class="file-field" size="40" /> &nbsp; <?php echo $this->lang->line('pdf_desc');?>: <input name="image_desc5" type="text" value="" style="width:300px;"> &nbsp; PDF <input name="pdf5" type="file" class="file-field" size="40" /></p>
					<p id="pdf_p_6" style="visibility: hidden; display: none;"  ><span class="number"><?php echo $this->lang->line('img_desc_pdf');?> 6</span> <input name="image6" type="file" class="file-field" size="40" /> &nbsp; <?php echo $this->lang->line('pdf_desc');?>: <input name="image_desc6" type="text" value="" style="width:300px;"> &nbsp; PDF <input name="pdf6" type="file" class="file-field" size="40" /></p>
					<p id="pdf_p_7" style="visibility: hidden; display: none;" ><span class="number"><?php echo $this->lang->line('img_desc_pdf');?> 7</span> <input name="image7" type="file" class="file-field" size="40" /> &nbsp; <?php echo $this->lang->line('pdf_desc');?>: <input name="image_desc7" type="text" value="" style="width:300px;"> &nbsp; PDF <input name="pdf7" type="file" class="file-field" size="40" /></p>
					<p id="pdf_p_8" style="visibility: hidden; display: none;" ><span class="number"><?php echo $this->lang->line('img_desc_pdf');?> 8</span> <input name="image8" type="file" class="file-field" size="40" /> &nbsp; <?php echo $this->lang->line('pdf_desc');?>: <input name="image_desc8" type="text" value="" style="width:300px;"> &nbsp; PDF <input name="pdf8" type="file" class="file-field" size="40" /></p>
					<p id="pdf_p_9" style="visibility: hidden; display: none;" ><span class="number"><?php echo $this->lang->line('img_desc_pdf');?> 9</span> <input name="image9" type="file" class="file-field" size="40" /> &nbsp; <?php echo $this->lang->line('pdf_desc');?>: <input name="image_desc9" type="text" value="" style="width:300px;"> &nbsp; PDF <input name="pdf9" type="file" class="file-field" size="40" /></p>
					<p id="pdf_p_10" style="visibility: hidden; display: none;" ><span class="number"><?php echo $this->lang->line('img_desc_pdf');?> 10</span> <input name="image10" type="file" class="file-field" size="40" /> &nbsp; <?php echo $this->lang->line('pdf_desc');?>: <input name="image_desc10" type="text" value="" style="width:300px;"> &nbsp; PDF <input name="pdf10" type="file" class="file-field" size="40" /></p>
				</div>
				<input type="button" value="+" onclick="addPdf()" />				
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
			<div id="sort-images-pdf">
				<?php $iteratorImage=0;?>
				<?php foreach($images as $image): ?>
				<?php $iteratorImage= $iteratorImage+1;?>
				<div class="image" id="item_<?php echo $image->id; ?>">
					<span class="drag-handle"></span>
					
					<a href="<?php echo base_url(); ?>uploads/downloads/<?php echo $image->name;?>" rel="lightbox"><img src="<?php echo image('uploads/downloads/', $image->name, 140, 140); ?>" alt="" width="140" height="140"></a>
						
					<p><textarea id="<?php echo $image->id;?>" name="image_desc" cols="10" rows="3" class="mceNoEditor image-desc" style="width:125px; height:40px; font-size:11px; display:none;"><?php echo $image->text; ?></textarea></p>
					<p>
                                           <input type="hidden" name="image_layout" id="image_layout_<?php echo $image->id;?>" class="image-layout" value="<?php echo $image->layout; ?>" />
						<a href="javascript:;" rel="<?php echo $image->id;?>" rev="<?php echo $image->position;?>" class="delete-image"><?php echo $this->lang->line('delete');?></a>					
					</p>
					<div id="sort-pdf">
						<?php $iteratorpadf=0;?>
						<?php foreach($pdfs as $pdf): ?>
						<?php $iteratorpadf=$iteratorpadf+1;?>
							<?php if ($iteratorpadf==$iteratorImage){?>
							<div class="pdf" id="item_pdf_<?php echo $pdf->id; ?>">	
												
								<h1><?php echo $pdf->name;?></h1>
								<!-- input type="button"  onclick="openPreview('pdf_<?php echo $pdf->id; ?>')" value="Preview"  / -->
								<a target="_blank" href="<?php echo base_url(); ?>uploads/downloads/<?php echo $pdf->name; ?>.pdf"  >VIEW PDF</a>
								<!-- div id="pdf_<?php echo $pdf->id; ?>" style="visibility: hidden; display: none;">
								  <object width="700" height="500" type="application/pdf" data="<?php echo base_url(); ?>uploads/downloads/<?php echo $pdf->name; ?>.pdf?#zoom=85&scrollbar=0&toolbar=0&navpanes=0" id="pdf_content">
								    <p>Insert your error message here, if the PDF cannot be displayed.</p>
								  </object>
								</div -->
								</div>					
							<?php }?>
						<?php endforeach; ?>							
					</div>
					
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