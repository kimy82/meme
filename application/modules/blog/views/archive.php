<div id="projectes">
	    
    <div id="esquerra_blog"><h1 class="interior_design_blog">BLOG<br />ARCHIVE<br /><?php echo $this->uri->segment(3,'');?><br /><?php echo $this->uri->segment(4,'') != '' ? strtoupper(get_natural_month($this->uri->segment(4,''))) : '';?></h1></div>
                
<?php 
foreach ($query as $row): ?>                
                <?php $this->load->view('_post', array('post' => $row)); ?>
<?php endforeach; ?>		
	
		
</div>