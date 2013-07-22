
<div id="projectes">
    
    <div id="esquerra_blog"><h1 class="interior_design_blog">BLOG</h1></div>    
    
    <div class="container_post">
        <h2><?php echo $title;?></a></h2>
        <h3><?php echo strftime("%e de %B, %Y", strtotime($date)); ?></h3>
                
		<?php if($video): ?>
			<div style="margin-bottom:20px;">
			<?php echo blog_embed_video($video); ?>
			</div>
		<?php endif; ?>
               
        <div style="overflow:hidden;">
       <?php if(count($images)>0) : ?>    
        <div class="foto_blog">

            <?php foreach($images as $image) : ?>
            <img src="<?php echo image('uploads/blog/', $image->name, 620);?>" alt="" class="image-border" /><br />
            <?php endforeach;  ?>

        </div>
        <?php endif; ?>    
        <div class="blog_text left_contacte">

        <?php echo $long_text; ?>
            
        </div>
        </div>                    
        
        <div style="margin-top: 20px; clear: both;">
        <!-- AddThis Button BEGIN -->
                <div class="addthis_toolbox addthis_default_style ">
                <a class="addthis_button_facebook_like" fb:like:layout="button_count"></a>
                <a class="addthis_button_tweet"></a>
                <a class="addthis_counter addthis_pill_style"></a>
                </div>
                <script type="text/javascript" src="http://s7.addthis.com/js/250/addthis_widget.js#username=xa-4cf52eac3591c1a4"></script>
                <!-- AddThis Button END -->                            
        </div>                        
       
    </div>    
        
</div>

