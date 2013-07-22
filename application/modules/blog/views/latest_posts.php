<div id="projectes">
	    
		<div id="esquerra_blog"><h1 class="interior_design_blog">BLOG</h1></div>
                
<?php 
foreach ($query as $row): ?>                
                <?php $this->load->view('_post', array('post' => $row)); ?>
<?php endforeach; ?>		
	
		
</div>