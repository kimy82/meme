<div id="downloads">

    <?php if($lang=='es'){ ?>
	    <?php foreach($query as $q) : ?>
	   	 <h1><?php echo $q->title_es ?></h1>
	   	 <?php echo $q->text_es ?>
	   	 
	   	 
	   	 
	   	 <div class="content" id="images-panel" style="display:block;">	
			<div id="sort-images-pdf">
				<?php $iteratorImage=0;?>
				<?php foreach($images as $image): ?>
				<?php if($image->item_id!=$q->id){ continue;}?>
				<?php $iteratorImage= $iteratorImage+1;?>
				
				<div class="image" id="item_<?php echo $image->id; ?>">
					<span class="drag-handle"></span>
					
										
					<div id="sort-pdf">
						<?php $iteratorpadf=0;?>
						<?php foreach($pdfs as $pdf): ?>
						<?php $iteratorpadf=$iteratorpadf+1;?>
							<?php if ($iteratorpadf==$iteratorImage){?>
							<div class="pdf" id="item_pdf_<?php echo $pdf->id; ?>">	
												
								<h1><?php echo $pdf->name;?></h1>	
								<a href="<?php echo base_url(); ?>uploads/downloads/<?php echo $pdf->name; ?>.pdf" rel="lightbox"><img src="<?php echo image('uploads/downloads/', $image->name, 140, 140); ?>" alt="" width="140" height="140"></a>
						
					<p><textarea id="<?php echo $image->id;?>" name="image_desc" cols="10" rows="3" class="mceNoEditor image-desc" style="width:125px; height:40px; font-size:11px; display:none;"><?php echo $image->text; ?></textarea></p>							
								<a target="_blank" href="<?php echo base_url(); ?>uploads/downloads/<?php echo $pdf->name; ?>.pdf"  >VIEW PDF</a>								
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
	   	 
	   	 
	   	 
	   	 
	   	 
	   	 
	   	 
		
	    <?php endforeach; ?>
    <?php }else if($lang=='en'){ ?>
        <?php foreach($query as $q) : ?>
	   	 <h1><?php echo $q->title_en ?></h1>
	   	 <?php echo $q->text_en ?>
	   	 
	   	 
	   	 
	   	 <div class="content" id="images-panel" style="display:block;">	
			<div id="sort-images-pdf">
				<?php $iteratorImage=0;?>
				<?php foreach($images as $image): ?>
				<?php if($image->item_id!=$q->id){ continue;}?>
				<?php $iteratorImage= $iteratorImage+1;?>
				
				<div class="image" id="item_<?php echo $image->id; ?>">
					<span class="drag-handle"></span>
					
										
					<div id="sort-pdf">
						<?php $iteratorpadf=0;?>
						<?php foreach($pdfs as $pdf): ?>
						<?php $iteratorpadf=$iteratorpadf+1;?>
							<?php if ($iteratorpadf==$iteratorImage){?>
							<div class="pdf" id="item_pdf_<?php echo $pdf->id; ?>">	
												
								<h1><?php echo $pdf->name;?></h1>	
								<a href="<?php echo base_url(); ?>uploads/downloads/<?php echo $pdf->name; ?>.pdf" rel="lightbox"><img src="<?php echo image('uploads/downloads/', $image->name, 140, 140); ?>" alt="" width="140" height="140"></a>
						
					<p><textarea id="<?php echo $image->id;?>" name="image_desc" cols="10" rows="3" class="mceNoEditor image-desc" style="width:125px; height:40px; font-size:11px; display:none;"><?php echo $image->text; ?></textarea></p>							
								<a target="_blank" href="<?php echo base_url(); ?>uploads/downloads/<?php echo $pdf->name; ?>.pdf"  >VIEW PDF</a>								
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
	   	 
	   	 
	   	 
	   	 
	   	 
	   	 
	   	 
		
	    <?php endforeach; ?>
    <?php }?>	
</div>